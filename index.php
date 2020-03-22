<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';
require 'config/mysql.php';
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

$klein->respond('GET', '/rest/[i:id]', function($request, $response, $service) {
	$rest = get_rest_by_id($request->id);

	$service->title = $rest['name'];
	$service->rest = $rest;
	$service->render('views/rest.php');
});

foreach (get_cities() as $city) {
	$klein->respond('GET', '/parkering/['.$city['url'].':city]', function($request, $response, $service) {
		$city = get_city_by_url($request->city);
		$rests = get_rests_by_city_id($city['id']);

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
