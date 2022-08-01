<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php_crud", $username, $password);
  // set the PDO error mode to exception
     
    $student_id=$_GET['student_id'];

    $sql="DELETE FROM tbl_student WHERE student_id=:sid";
    $data=$conn->prepare($sql);
    $data->bindParam(':sid',$student_id);
    $data->execute();

    header("Location:view_student.php");



  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
