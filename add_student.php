<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php_crud", $username, $password);
  // set the PDO error mode to exception


    if(isset($_POST['btn'])){
        $student_name=$_POST['student_name'];
        $student_email=$_POST['student_email'];
        $student_phone=$_POST['student_phone'];
        $student_address=$_POST['student_address'];

        // print_r($student_name);
        // exit();

        $sql="INSERT INTO tbl_student(student_name,student_email,student_phone,student_address) VALUES(:sname,:semail,:sphone,:saddress)";
        $data=$conn->prepare($sql);
        $data->bindParam(":sname",$student_name);
        $data->bindParam(":semail",$student_email);
        $data->bindParam(":sphone",$student_phone);
        $data->bindParam(":saddress",$student_address);
        $data->execute();



    }



  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>



<a href="add_student.php">Add Student</a> || <a href="view_student.php">View Student</a>

<br>
<br>
<br>


<form action="" method="post">
  Student Name:<input type="text" name="student_name">
   <br>
   <br>
  Student Email:<input type="email" name="student_email">
   <br>
   <br>

  Student Phone:<input type="number" name="student_phone">
   <br>
   <br>

   Student Address:<textarea cols="15" rows="5" name="student_address"></textarea>

<br>
<br>

  <input type="submit" name="btn">  <input type="reset">
</form>