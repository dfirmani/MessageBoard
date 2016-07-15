<?php
namespace Config;
	
	class Autoload{
		public static function run(){
			spl_autoload_register(function($class){
				$route=str_replace("\\", "/", $class).".php";
				if (is_readable($route)){
					require_once $route;
				}
				else {
					echo "The file does not exist";
				}
			});
		}
	}
?>