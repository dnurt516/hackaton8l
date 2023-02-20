<?php 
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(1);
	/* ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	*/

	session_start();


	define('WAY', './');

	// config
	require_once WAY.'config/settings.php';
	require_once WAY.'config/db.php';

	// classes
	require_once WAY.'classes/Common.php';
	require_once WAY.'classes/HTML.php';

	// inc
	require_once WAY.'lib/fun.php';
	require_once WAY.'lib/nav.php';
 
	$html->Render($content);
 ?>