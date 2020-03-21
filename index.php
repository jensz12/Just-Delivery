<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$mysqli = new mysqli('localhost' , 'jensz12_je' , 'f)wEjDe4%qHq' , 'jensz12_je');
$mysqli->set_charset('utf8mb4');

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

$klein->onHttpError(function ($code, $router) {
	if ($code == 404) {
		$service = $router->service();
		$service->title = '404 - Siden blev ikke fundet';
		$service->render('views/404.php');
  }
});

$klein->dispatch();
?>
