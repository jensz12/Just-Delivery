<?php

function remove_accents($text) {
	$text = mb_strtolower($text);
	$text = str_replace(array('ê', 'é'), 'e', $text);
	$text = str_replace('ö', 'o', $text);
	$text = str_replace('\'', '', $text);
	
	
	return $text;
}
?>