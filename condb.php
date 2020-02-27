<?php
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "thaiorange";
$condb = mysqli_connect($host,$uname,$passwd,$db);
$condb->set_charset('utf8');
date_default_timezone_set('Asia/bangkok');

define("URL", "http://localhost/PROJECT/");
define("CSS", URL."css/");
define("JS", URL."js/");
define("PLUGIN", URL."plugin/");
?>