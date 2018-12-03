<?php
require "fun.php";
header("content-type:text/html;charset=utf-8");

$body = $_POST["body"];

$servername = "www.myface.com";
$username = "root";
$password = "root";
$dbname = "myface";

$php_body = json_decode($body);
$domains_large = $php_body->domains->large;
$count = count($php_body->visitors);

for ($i = 0; $i < $count; $i++) {
    $personId = $php_body->visitors[$i]->personId;
    $name = $php_body->visitors[$i]->name;
    $type = $php_body->visitors[$i]->type;
    $sex = $php_body->visitors[$i]->attributes[0]->text;
    $age = $php_body->visitors[$i]->attributes[1]->text;
    $imageurl = $php_body->visitors[$i]->thumbnail->path;
    $visitdate=$php_body->visitors[$i]->start;
    //visitor记录
    $formatstr = "INSERT INTO visitors (personId, name, type, sex, age, imageurl) VALUES ('key0', 'key1', 'key2', 'key3', 'key4', 'key5')";
    $valuedict = array("key0" => $personId, "key1" => $name, "key2" => $type, "key3" => $sex, "key4" => $age, "key5" => $imageurl);
    $sqlstr = create_sqlstr($formatstr, $valuedict);
    echo $sqlstr;
    newsql($servername, $username, $password, $dbname, $sqlstr);
    //visitor时间记录
    $formatstr="INSERT INTO visitdate(personId, name, visitdate) VALUES ('key0','key1','key2')";
    $valuedict=array("key0" => $personId, "key1" => $name, "key2" => $visitdate);
    $sqlstr = create_sqlstr($formatstr, $valuedict);
    newsql($servername, $username, $password, $dbname, $sqlstr);
}
//删除重复记录，以personId为线索
$sqlstr="delete from visitors 
where peopleId  in (select  personId  from visitors  group  by  personId   having  count(personId) > 1)
and rowid not in (select min(rowid) from  visitors  group by personId  having count(personId )>1)";
newsql($servername, $username, $password, $dbname, $sqlstr);
?>