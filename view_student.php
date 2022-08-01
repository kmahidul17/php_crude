<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=php_crud", $username, $password);
  // set the PDO error mode to exception


    $sql="SELECT * FROM tbl_student";
    $data=$conn->prepare($sql);
    $data->execute();

    

    // echo '<pre>';

    // print_r($row);
    // exit();



  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


<script>
    
    function deleteStudent(){
          
        var msg=confirm("Are You Sure To Delete This");

        if(msg){
            return true;
        }
        else{
            return false;
        }

    }

</script>


<a href="add_student.php">Add Student</a> || <a href="view_student.php">View Student</a>

<br>
<br>
<br>


<h1>View Student</h1>

<table border="1px solid black" style="width:100%; height: auto">

   <tr>
      <td>Student ID</td>
      <td>Student Name</td>
      <td>Student Email</td>
      <td>Student Phone</td>
      <td>Action</td>

   </tr>



   <?php
     while($row=$data->fetch(PDO::FETCH_ASSOC)){


   
   
   ?>
   <tr>
      <td><?php echo $row['student_id']?></td> 
      <td><?php echo $row['student_name']?></td>
      <td><?php echo $row['student_email']?></td> 
      <td><?php echo $row['student_phone']?></td>
      <td>
        <a href="update_student.php?student_id=<?php echo $row['student_id']?>"><button>Update</button></a>
        <a href="delete_student.php?student_id=<?php echo $row['student_id']?>" onclick=" return deleteStudent()"><button>Delete</button></a>
      </td>  
    </tr>
<?php   }?>

</table>