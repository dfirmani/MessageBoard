<?php
namespace Config;

	class Request{
		private $controller;
		private $method;
		private $argument;

		public function __construct (){
			if (isset($_GET['url'])){
				$route=filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$route=explode("/", $route);
				$route=array_filter($route);

				if($route[0] == "index.php"){
					$this->controller="user";
				}else{
					$this->controller=strtolower(array_shift($route));
				}

				$this->method=strtolower(array_shift($route));

				if(!$this->method){
					$this->method="index";
				}
				$this->argument=$route;
			}else{
				$this->controller="user";
				$this->method="index.php";
			}
		}

		public function getController (){
			return $this->controller;
		}

		public function getMethod (){
			return $this->method;
		}	

		public function getArgument (){
			return $this->argument;
		}
	}
?>