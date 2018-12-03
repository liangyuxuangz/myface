<?php
header("content-type:text/html;charset=utf-8");
require_once "fun.php";

$servername = "www.myface.com";
$username = "root";
$password = "root";
$dbname = "myface";

$formatstr="INSERT INTO visitdate (personID, visitdate) VALUE ( key1, key2 )";
$valuedict=array("key1"=>"'A2222'", "key2"=>"2018-11-23");
$sqlstr=create_sqlstr($formatstr, $valuedict);
echo $sqlstr;
//newsql($servername, $username, $password, $dbname, $sqlstr);
?>