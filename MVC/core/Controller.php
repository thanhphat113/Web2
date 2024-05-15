<?php
	class Controller {
		public function model($model) {
			return new $model;
		}

		public function view($view, $data = []) {
			require_once "./MVC/views/". $view .".php";
		}
		public function models($model){
			require_once "./MVC/models/Models/".$model.".php";
			return new $model;
		}
	}

	
?>