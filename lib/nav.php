<?php 
	
	$html = new HTML;

	$url = $html->url[0];

	$content = '';

	if ($url) {
		if ($url == 'ajax') {
			include 'ajax.php';
		} else {
			$file = '../classes/'.$html->array_urls[$url];

			if (file_exists($file)) {
				require_once $file;
				$class = new $html->array_urls[$url];

				if (method_exists($class, 'Content')) $content .= $class->Content();
			} else {
				$content .= 'Error 404';
			}
		}
	} else {
		$content .= $html->MainPage();
	}

 ?>