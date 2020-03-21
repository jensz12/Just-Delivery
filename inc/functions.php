<?php
function remove_accents($text) {
	$text = mb_strtolower($text);
	$text = str_replace(array('ê', 'é'), 'e', $text);
	$text = str_replace('ö', 'o', $text);
	$text = str_replace(array('\'','’'), '', $text);

	return $text;
}

function get_cities() {
	global $mysqli;

	$sql = 'SELECT * FROM city ORDER BY name ASC';
	$result = $mysqli->query($sql);

	$cities = [];

	while ($city = $result->fetch_assoc()) {
		$cities[] = $city;
	}

	return $cities;
}

function get_city_by_url($url) {
	global $mysqli;

	$sql = 'SELECT * FROM city WHERE url = "'.$url.'"';
	$result = $mysqli->query($sql);

	return $result->fetch_assoc();
}

function format_rest_address($rest) {
	if (empty($rest['address']) || empty($rest['postcode']) || empty($rest['city']))
		return;

	return $rest['address'].', '.$rest['postcode'].' '.$rest['city'];
}
?>
