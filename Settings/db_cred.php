<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://bbb7d7a4ab2a24:690a2818@us-cdbr-east-06.cleardb.net/heroku_c01494770f15ced?reconnect=true"));

//credentials
define('DB_SERVER', $cleardb_url["host"]);
define('DB_USERNAME', $cleardb_url["user"]);
define('DB_PASSWORD', $cleardb_url["pass"]);
define('DB_NAME', substr($cleardb_url["path"],1));


$active_group = 'default';
$query_builder = TRUE;




?>