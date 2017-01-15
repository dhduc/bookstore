<?php
define('DB_SERVER', 'localhost');//Apache server's IP
define('DB_USERNAME', 'root');//DB's username
define('DB_PASSWORD', 'root');//DB's password
define('DB_DATABASE', 'bookstore');
define('HOME', 'http://bookstore.local');//Homepage's address
define('ADMIN', 'http://bookstore.local/admin');//Administrator's address
//Optional
define("EMAIL","huuduc.uneti@gmail.com");
define("FACEBOOK","https://www.facebook.com/");
define("TWITTER","https://twitter.com");
define("MOBILE","0984-137-119");
define("ABOUT",'');
define("POLICY",'');
define("FAQ",'');

$con = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
$db = mysql_select_db(DB_DATABASE, $con);
mysql_query("SET NAMES 'utf8'");


?>