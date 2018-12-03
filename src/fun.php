<?php
header("content-type:text/html;charset=utf-8");

function newsql($servername, $username, $password, $dbname, $sqlstr)
{
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    if ($conn->query($sqlstr) === true) {
        echo "新记录插入成功";
    } else {
        echo "Error: " . $sqlstr . "<br>" . $conn->error;
    }

    $conn->close();
}

function create_sqlstr($formatstr, $replacedict)
{
    $tmp=$formatstr;
    foreach ($replacedict as $x=>$x_value){
        //echo $x;
        //echo '<br/>';
        //echo $x_value;
        //echo '<br/>';
        $tmp=str_replace($x, $x_value, $tmp);
    }
    return $tmp;
    //echo $tmp;
}

?>