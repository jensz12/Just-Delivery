<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$mysqli = new mysqli('localhost' , 'jensz12_je' , 'f)wEjDe4%qHq' , 'jensz12_je_new');
$mysqli->set_charset('utf8');

if ($mysqli->connect_errno)
	die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

require 'vendor/autoload.php';
require 'inc/functions.php';

$klein = new \Klein\Klein();

$klein->respond(function($request, $response, $service) {
	$service->cities = get_cities();
	$service->layout('views/main.php');
});

$klein->respond('GET', '/', function($request, $response, $service) {
	$service->title = 'Forside';
	$service->render('views/front.php');
});

$klein->respond('GET', '/bg', function($request, $response, $service) {
	$service->title = 'Baggrunde';
	$service->render('views/bg.php');
});

foreach (get_cities() as $city) {
	$klein->respond('GET', '/parkering/['.$city['url'].':city]', function($request, $response, $service) {
		global $mysqli;

		$city = get_city_by_url($request->city);

		$sql = 'SELECT * FROM rest WHERE city_id = '.$city['id'].' ORDER BY name ASC';

		if (!($result = $mysqli->query($sql)))
			die($mysqli->error);

		$rests = [];

		while ($rest = $result->fetch_assoc()) {
			$rests[] = $rest;
		}

		$service->title = 'Parkeringsguide - '.$city['name'];
		$service->rests = $rests;
		$service->render('views/parkering.php');
	});
}

$klein->respond('GET', '/convert/F9JN6kZrRzMcnEqQ', function($request, $response, $service) {
	$cities = require 'config/convert.php';

	$mysqli_new = new mysqli('localhost' , 'jensz12_je' , 'f)wEjDe4%qHq' , 'jensz12_je_new');
	$mysqli_new->set_charset('utf8');

	if ($mysqli_new->connect_errno)
		die('Der kunne ikke oprettes forbindelse til jensz12_je_new. Prøv igen om lidt');

	$result = $mysqli_new->query('SELECT * FROM rest');

	if ($result->num_rows != 0)
		die('Ny database ikke tom, tøm den og prøv igen!');

	foreach ($cities as $city) {
		$mysqli = new mysqli('localhost' , $city['mysql']['username'], $city['mysql']['password'], $city['mysql']['database']);
		$mysqli->set_charset('utf8');

		if ($mysqli->connect_errno)
			die('Der kunne ikke oprettes forbindelse til '.$city['mysql']['database'].'. Prøv igen om lidt');

		$result = $mysqli->query('SELECT * FROM rest');

		while ($rest = $result->fetch_assoc()) {
			if (!empty($rest['adresse'])) {
				//Split old address field
				list($address, $postcode_city) = explode(',', $rest['adresse']);

				$address = trim($address);

				preg_match('/([0-9]{4}) (.+)/', $postcode_city, $matches);

				if (empty($matches))
					echo $city['mysql']['database'].' - '.$rest['navn'].'<br />';

				$postcode = $matches[1];
				$city_field = trim($matches[2]);
			}

			else {
				$address = '';
				$postcode = '';
				$city_field = '';
			}

			$sql = 'INSERT INTO rest (city_id, name, address, postcode, city, tel, parking, note) VALUES ("'.$city['new_city_id'].'","'.$rest['navn'].'","'.$address.'","'.$postcode.'","'.$city_field.'","'.$rest['tlf'].'","'.$mysqli_new->real_escape_string($rest['parkering']).'","'.$rest['note'].'")';

			if (!$mysqli_new->query($sql))
				die($mysqli_new->error);
		}

		$mysqli->close();
	}

	$mysqli_new->close();
});

$klein->onHttpError(function ($code, $router) {
	if ($code == 404) {
		$service = $router->service();
		$service->title = '404 - Siden blev ikke fundet';
		$service->render('views/404.php');
  }
});

$klein->dispatch();
?>
