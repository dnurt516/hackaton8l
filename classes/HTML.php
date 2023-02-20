<?php 
	class HTML {
		public $url;
		public $array_urls = array(
			// "url[0]" => "class name"
		);

		function __construct() {
			date_default_timezone_set('Asia/Almaty');

			$this->Url();
		}

	    private function Url() {
			$get_ex = explode("/?",$_SERVER['REQUEST_URI']);

	        if (count($get_ex) > 1) {

	            $amp = explode("&",$get_ex[1]);
	            if ($amp) {

	                foreach ($amp as $ar) {

	                    $g = explode("=",$ar);
	                    $_GET[$g[0]] = $g[1];

	                }

	            }

	        }

	        if (count($get_ex) > 1) {

	            $exp = explode("/",$get_ex[0]);
	        } else {
	            $exp = explode("/",$_SERVER['REQUEST_URI']);
	        }

	        if ($exp) {

	            foreach ($exp as $val) {

	               if ($val) { $this->url[] = htmlspecialchars($val); }

	            }

	        }
	    }

	    public function MainPage() {
	    	include './pages/main.php';

	    	return $ret;
	    }

	    public function Head() {
	    	include './pages/header.php';

	    	return $ret;
	    }

	    public function Top() {
	    	include './pages/top.php';

	    	return $ret;
	    }

	    public function Footer() {
	    	include './pages/footer.php';

	    	return $ret;
	    }


	    public function Render($content) {
	    	echo $this->Head().$this->Top().$content.$this->Footer();
	    }

	}
 ?>