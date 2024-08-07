<?php

$stu_name = $_POST['sname'];
$stu_adress = $_POST['sadress'];
$stu_class = $_POST['class'];
$stu_sphone = $_POST['sphone'];
 
include "config.php";

$sql = "INSERT INTO student(sname,sadress,sclass,sphone) VALUES ('{$stu_name}','{$stu_adress}','{$stu_class}','{$stu_sphone}')";
$result = mysqli_query($conn, $sql) or die("Query Faild");

header("Location: http://localhost/index.php");

mysqli_close($conn);


?>