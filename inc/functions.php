<?php
function remove_accents($text) {
	$text = mb_strtolower($text);
	$text = str_replace(['ê', 'é'], 'e', $text);
	$text = str_replace('ö', 'o', $text);
	$text = str_replace(['\'','’'], '', $text);

	return $text;
}

function get_backgrounds() {
	$backgrounds = include 'config/backgrounds.php';

	return $backgrounds;
}

function get_cities() {
	$cities = DB::query('SELECT * FROM city ORDER BY name ASC');

	return $cities;
}

function get_city_by_id($id) {
	$city = DB::queryFirstRow('SELECT * FROM city WHERE id = %i', $id);

	return $city;
}

function get_city_by_url($url) {
	$city = DB::queryFirstRow('SELECT * FROM city WHERE url = %s', $url);

	return $city;
}

function get_rest_by_id($id) {
	$rest = DB::queryFirstRow('SELECT *  FROM rest WHERE id = %i', $id);

	return $rest;
}

function get_rests_by_city_id($city_id) {
	$rests = DB::query('SELECT * FROM rest WHERE city_id = %i ORDER BY name ASC', $city_id);

	return $rests;
}

function get_rests_count($city_id) {
	$count = DB::queryFirstField('SELECT COUNT(*) from rest WHERE city_id = %i', $city_id);

	return $count;
}

function format_rest_address($rest) {
	if (empty($rest['address']) || empty($rest['postcode']) || empty($rest['city']))
		return;

	return $rest['address'].', '.$rest['postcode'].' '.$rest['city'];
}

function format_rest_nav_link($rest) {
	$nav_link = 'https://www.google.com/maps/dir/?api=1&origin=&destination='.urlencode(format_rest_address($rest));

	return $nav_link;
}

function format_breadcrumb($items) {
	$html = [];

	//Add frontpage to items
	$items = ['/' => 'Forside'] + $items;

	foreach ($items as $url => $text) {
		$current = null;

		if ($url === array_key_last($items))
			$current = ' active" aria-current="page';

		if (is_string($url))
			$text = '<a href="'.$url.'">'.$text.'</a>';

		$html[] = '<li class="breadcrumb-item'.$current.'">'.$text.'</li>';
	}

	return implode("\n", $html);
}
?>
