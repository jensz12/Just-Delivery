<?php 
require 'vendor/autoload.php';
require 'inc/functions.php';
$klein = new \Klein\Klein();

$klein->respond(function($request, $response, $service) {
	$service->layout('views/main.php');
});

$klein->respond('GET', '/', function($request, $response, $service) {
  $service->title = 'Forside';
	$service->render('views/front.php');
});

$klein->respond('GET', '/city', function($request, $response, $service) {
  $service->title = 'Vælg by';
	$service->render('views/city.php');
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - Hillerød';
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - Odense';
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - CPH';
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - Roskilde';
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - Aarhus';
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
    $rest['under_rests'] = get_under_rests($mysqli, $rest['id']);
    $rest['under_rests_lowercase'] = array_map('mb_strtolower', $under_rests);

    $rests[] = $rest;
  }

  $service->title = 'DEVELOPMENT: Parkeringsguide - Aalborg';
  $service->rests = $rests; 
	$service->render('views/parkering.php');
});

$klein->dispatch();
?>