<?php
	class App{
		protected $controller = "admin";
		protected $action = "show";
		protected $params = []; 

		function __construct(){
			$arr = $this->urlProcess() ;

			//Controller
			if (file_exists("./MVC/controllers/". $arr[0] .".php")){
				$this->controller = $arr[0];
				unset($arr[0]) ;
			}
			require_once "./MVC/controllers/". $this->controller .".php";

			
			//Action
			if (isset($arr[1])){
				if (method_exists($this->controller, $arr[1])){
					$this->action = $arr[1];
				}
				unset($arr[1]) ;
			}

			//Param
			$this->params = $arr?array_values($arr):[];

			$doiTuong = new $this->controller();

			call_user_func_array([$doiTuong, $this->action], $this->params);
		
		}

		function urlProcess(){
			if(isset($_GET['url'])){
				return explode("/",filter_var(trim($_GET['url'],"/")));
			}
		}
	}


?>