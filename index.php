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

$klein->respond('GET', '/login', function($request, $response, $service) {
	$service->title = 'Login';
	$service->render('views/admin/login.php');
});

/* Needs a complete rework to work with multiple citys at some point */
$klein->respond('GET', '/info', function($request, $response, $service) {
	$service->title = 'Info';
	$service->render('views/info.php');
});

$klein->respond('GET', '/admin', function($request, $response, $service) {
	$service->title = 'Admin';
	$service->render('views/admin/admin.php');
});

$klein->respond('GET', '/baggrunde', function($request, $response, $service) {
	$service->title = 'Baggrunde';
	$service->backgrounds = get_backgrounds();
	$service->render('views/backgrounds.php');
});

$klein->respond('GET', '/rest/[i:id]', function($request, $response, $service) use ($klein) {
	$rest = get_rest_by_id($request->id);

	if (!isset($rest))
		$klein->abort(404);

	$city = get_city_by_id($rest['city_id']);

	$service->title = $rest['name'];
	$service->breadcrumb = ['/parkering/'.$city['url'] => $city['name'], $rest['name']];
	$service->rest = $rest;
	$service->render('views/rest.php');
});

foreach (get_cities() as $city) {
	$klein->respond('GET', '/parkering/['.$city['url'].':city]', function($request, $response, $service) {
		$city = get_city_by_url($request->city);
		$rests = get_rests_by_city_id($city['id']);

		$service->title = 'Parkeringsguide - '.$city['name'];
		$service->breadcrumb = [$city['name']];
		$service->city = $city;
		$service->rests = $rests;
		$service->render('views/parking.php');
	});
}

$klein->onHttpError(function ($code, $router) {
	if ($code == 404) {
		$service = $router->service();
		$service->title = '404 - Siden blev ikke fundet';
		$service->breadcrumb = ['404'];
		$service->render('views/404.php');
	}
});

$klein->dispatch();
?>
