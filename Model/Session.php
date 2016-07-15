<?php
namespace Model;
class Session{	
	public function init(){
		@session_start();
	}
	
	public function set($varname, $value){
		$_SESSION[$varname] = $value;
	}
	
	public function destroy(){
		session_unset();
		session_destroy();
	}
}
?>