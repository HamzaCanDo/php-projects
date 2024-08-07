<?php
$stu_id = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_adress = $_POST['sadress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];
 
include "config.php";

$sql = "UPDATE student SET sname = '{$stu_name}', sadress = '{$stu_adress}', sclass = '{$stu_class}', sphone = '{$stu_phone}' WHERE sid = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Failed");

header("Location: http://localhost/index.php");

mysqli_close($conn);


?>