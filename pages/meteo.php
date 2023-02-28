<?php 
	$meteo = [];

	include './lib/simple_html_dom.php';
	$code = file_get_html('https://www.gismeteo.ru/weather-pavlodar-5174/gm/');
	$widget = $code->find('.widget-geomagnetic');
	$gmcurrent = $widget[0]->find('.gmcurrent');
	$gm_list = $widget[0]->find('.gm-wrap .value');

	for ($i = 0; $i < count($gm_list); $i++) {
		echo $gm_list[$i]->text() . "\n";	//вытаскиваем из тега атрибут href
	}
 ?>