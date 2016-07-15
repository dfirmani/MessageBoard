<?php
namespace Config;

	class Router {
		public static function run(Request $request){
			$controller=$request->getController()."Controller";
			$method=$request->getMethod();
			$argument=$request->getArgument();
			$router= ROOT."Controller".DS.$controller.".php";

			if ($method=="index.php"){
				$method = "login";
			}
			if(is_readable($router)){
				require_once $router;
				$display = "Controller\\".$controller;
				$controller = new $display;
				if (!isset($argument)){
					$data = call_user_func(array($controller, $method));
				}else{
					$data = call_user_func_array(array($controller, $method), $argument);
				}
			}
			else{
				print "The requested document was not found on this server.Controller/";
			}

			//upload views
			$router = ROOT."View".DS.$request->getController().DS.$request->getMethod().".php";
			$router2 = ROOT."View".DS."index.php";
			if(is_readable($router)){
				require_once $router;
			}
			else if(is_readable($router2)){
				require_once $router2;
			}
			else{
				print "The requested document was not found on this server. View";
			}
		}
	}
?>