<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';
require 'inc/functions.php';
$klein = new \Klein\Klein();

$klein->respond(function($request, $response, $service) {
	$service->cities = include 'config/cities.php';
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


$klein->respond('GET', '/parkering/hilleroed', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_hil' , 'ETH[*eNfWz9s' , 'jensz12_je_hil');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Hillerød';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/odense', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_odense' , 'wI3,+cVX2{zc' , 'jensz12_je_odense');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Odense';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/cph', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_cph' , '4k7zs!,Tqp}N' , 'jensz12_je_cph');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - København, Frederiksberg & Tårnby';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/nord', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_nord' , '4k[A}1riR1Nw' , 'jensz12_je_nord');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);
	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Nord for København';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/vestegnen', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_vest' , '0H%[4)Xn(n&t' , 'jensz12_je_vest');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);
	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Vestegnen';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/roskilde', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_roskilde' , 'oZx^yv]Q%;Ov' , 'jensz12_je_roskilde');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Roskilde';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/aarhus', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je_aarhus' , 'Y#;gt0yrrcfy' , 'jensz12_je_aarhus');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Aarhus';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/parkering/aalborg', function($request, $response, $service) {

	$mysqli = new mysqli('localhost' , 'jensz12_je' , 'f)wEjDe4%qHq' , 'jensz12_je');
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_errno)
		die('Der kunne ikke oprettes forbindelse til databasen. Prøv igen om lidt');

	$sql = 'SELECT * FROM rest ORDER BY navn ASC';
	$result = $mysqli->query($sql);

	$rests = [];

	while ($rest = $result->fetch_assoc()) {
		$rests[] = $rest;
	}

	$service->title = 'Parkeringsguide - Aalborg';
	$service->rests = $rests;
	$service->render('views/parkering.php');
});

$klein->respond('GET', '/convert/F9JN6kZrRzMcnEqQ', function($request, $response, $service) {
	$cities = require 'config/convert.php';

	$mysqli_new = new mysqli('localhost' , 'jensz12_je' , 'f)wEjDe4%qHq' , 'jensz12_je_new');
	$mysqli_new->set_charset('utf8');

	if ($mysqli_new->connect_errno)
		die('Der kunne ikke oprettes forbindelse til jensz12_je_new. Prøv igen om lidt');

	foreach ($cities as $city) {
		$mysqli = new mysqli('localhost' , $city['mysql']['username'], $city['mysql']['password'], $city['mysql']['database']);
		$mysqli->set_charset('utf8');

		if ($mysqli->connect_errno)
			die('Der kunne ikke oprettes forbindelse til '.$city['mysql']['database'].'. Prøv igen om lidt');

		$result = $mysqli->query('SELECT * FROM rest');

		while ($rest = $result->fetch_assoc()) {
			//Split old address field
			list($address, $postcode_city) = explode(',', $rest['adresse']);

			$address = trim($address);

			preg_match('/([0-9]{4}) (.+)/', $postcode_city, $matches);

			$postcode = $matches[1];
			$city_field = trim($matches[2]);

			$sql = 'INSERT INTO rest (city_is, name, address, postcode, city, tel, parking, note) VALUES ("'.$city['new_city_id'].'","'.$rest['navn'].'","'.$address.'","'.$postcode.'","'.$city_field.'","'.$rest['tlf'].'","'.$rest['parkering'].'","'.$rest['note'].'")';
			$mysqli_new->query($sql);
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
