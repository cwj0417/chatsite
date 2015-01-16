<?php
define('APP_NAME','App');
define('APP_PATH','./App/');
define('APP_DEBUG',true); 


/*ini_set("session.gc_maxlifetime",10);
//ini_set("session.cookie_lifetime",5);

header("content-type:text/html;charset=utf-8");
ini_set('session.gc_probability',100);

ini_set("session.save_path",$_SERVER['DOCUMENT_ROOT'].'/session/');
ini_set("session.use_cookies","1");*/


//setcookie(session_name(),session_id(),time()+5);

require './ThinkPHP/ThinkPHP.php';
//header("Location:http://jd.com");
?>
