<?php
echo "hola";
use Model\Session as Session;
$session = new Session();
$session->init();
$session->destroy();
header("Location: ".URL."/user/login");
?>