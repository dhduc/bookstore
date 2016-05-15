<?php
define('DB_SERVER', 'localhost');//Apache server's IP
define('DB_USERNAME', 'root');//DB's username
define('DB_PASSWORD', 'root');//DB's password
define('DB_DATABASE', 'php.bookstore');
define('HOME', 'http://bookstore.php.local');//Homepage's address
define('ADMIN', 'http://bookstore.php.local/admin');//Administrator's address
//Optional
define("EMAIL","huuduc.uneti@gmail.com");
define("FACEBOOK","https://www.facebook.com/");
define("TWITTER","https://twitter.com");
define("MOBILE","0984-137-119");
define("ABOUT",'http://117.6.160.54:8080/bookstore/page.php?page_name=V%E1%BB%81%20ch%C3%BAng%20t%C3%B4i');
define("POLICY",'http://117.6.160.54:8080/bookstore/policy.php');
define("FAQ",'http://117.6.160.54:8080/bookstore/page.php?page_name=Faq');

$con = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
$db = mysql_select_db(DB_DATABASE, $con);
mysql_query("SET NAMES 'utf8'");


?>