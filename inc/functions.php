<?php
function remove_accents($text) {
	$text = mb_strtolower($text);
	$text = str_replace(array('ê', 'é'), 'e', $text);
	$text = str_replace('ö', 'o', $text);
	$text = str_replace(array('\'','’'), '', $text);

	return $text;
}

function get_cities() {
	$cities = DB::query('SELECT * FROM city ORDER BY name ASC');

	return $cities;
}

function get_city_by_url($url) {
	$city = DB::queryFirstRow('SELECT * FROM city WHERE url = %s', $url);

	return $city;
}

function format_rest_address($rest) {
	if (empty($rest['address']) || empty($rest['postcode']) || empty($rest['city']))
		return;

	return $rest['address'].', '.$rest['postcode'].' '.$rest['city'];
}

function format_rest_nav_link($rest) {
	return 'https://www.google.com/maps/dir/?api=1&origin=&destination='.urlencode(format_rest_address($rest));
}
?>
