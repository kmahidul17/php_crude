<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php_crud", $username, $password);
  // set the PDO error mode to exception

  $student_id=$_GET['student_id'];
  $sql="SELECT * FROM tbl_student WHERE student_id=:sid";
    $data=$conn->prepare($sql);
    $data->bindParam(':sid',$student_id);
    $data->execute();

    $row=$data->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['btn'])){
        $student_name=$_POST['student_name'];
        $student_email=$_POST['student_email'];
        $student_phone=$_POST['student_phone'];
        $student_address=$_POST['student_address'];

      $sql="UPDATE tbl_student SET student_name=:sname, student_email=:semail, student_phone=:sphone, student_address=:saddress WHERE student_id=:sid";
      $data=$conn->prepare($sql);
      $data->bindParam(":sid",$student_id);
      $data->bindParam(":sname",$student_name);
      $data->bindParam(":semail",$student_email);
      $data->bindParam(":sphone",$student_phone);
      $data->bindParam(":saddress",$student_address);
      $data->execute();

       header("Location:view_student.php");



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
  Student Name:<input type="text" name="student_name" value="<?php echo $row['student_name']?>">
   <input type="hidden" value="<?php echo $row['student_id']?>" name="student_id">
   <br>
   <br>
  Student Email:<input type="email" name="student_email" value="<?php echo $row['student_email']?>">
   <br>
   <br>

  Student Phone:<input type="number" name="student_phone" value="<?php echo $row['student_phone']?>">
   <br>
   <br>

   Student Address:<textarea cols="15" rows="5" name="student_address"><?php echo $row['student_address']?></textarea>

<br>
<br>

  <input type="submit" name="btn" value="update">  <input type="reset">
</form>