<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://bbb7d7a4ab2a24:690a2818@us-cdbr-east-06.cleardb.net/heroku_c01494770f15ced?reconnect=true"));
$cleardb_server = $cleardb_url["us-cdbr-east-06.cleardb.net"];
$cleardb_username = $cleardb_url["bbb7d7a4ab2a24"];
$cleardb_password = $cleardb_url["690a2818"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;


define('DB_SERVER', $cleardb_url["us-cdbr-east-06.cleardb.net"]);
define('DB_USERNAME', $cleardb_url["bbb7d7a4ab2a24"]);
define('DB_PASSWORD', $cleardb_url["690a2818"]);
define('DB_NAME', substr($cleardb_url["path"],1));

echo DB_NAME;
?>