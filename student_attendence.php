<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
if(isset($_POST['dl_btn'])){
  $id = $_POST['row_id'];
if($con->connect_error){
  die("connection error: " .$con->connect_error);
}
else
{
  $del = "DELETE FROM student WHERE id=$id";
  if($con->query($del) == TRUE ){
      ?>
      <script>
          alert("Delete Sucessfull");
          window.location='index.php';
      </script>
      <?php
  }
  else{
      ?>
      <script>
          alert("Error");
      </script>
      <?php
  }
}
}

if(isset($_POST['submit'])){
  foreach($_POST['status'] as $id=>$status){
    $course = $_POST['course'][$id];
    $batch = $_POST['batch'][$id];
    $name = $_POST['name'][$id];
    $roll = $_POST['roll'][$id];
    $image = $_POST['image'][$id];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO attendence(course,batch,name,roll_no,image,attendence,date) VALUES ('$course','$batch','$name','$roll','$image','$status','$date')";

    if($con->query($sql) == TRUE){
      ?>
      <script>
          alert("Attendence Sucessfull Get");
          window.location='select_student_atten.php';
      </script>
      <?php
  }
  else{
      ?>
      <script>
          alert("Sorry Your Data is Not Submit");
      </script>
      <?php
  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image\attendence.png" type="image/x-icon">
    <title>Student Attendance</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
      th{
    text-align: center;
}
td{
    text-align: center; 
}
.btn {
    margin: 30px;
  width: 90px;
  height: 50px;
  background: #41b6e6;
  color: #ffffff;
  border-color: transparent;
  border-radius: 5px;
}
.btn:hover {
  background: #5bd1d7;
}
    </style>
</head>
<body>
    <center>
    
    <h1 class="h3 mb-0 text-gray-800">Take Attendance (Today's Date : <?php echo $date = date("Y-m-d");?>)</h1>
    
      <div class="box">
    
      <form action="student_attendence.php" method="POST">
    <table class="content-table" style="width: 80%; margin-left:10px;">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Course</th>
            <th>Batch</th>
            <th>Name</th>
            <th>Roll No</th>
            <th>Image</th>
            <th>Take Attendence</th>
          </tr>
        </thead>
       
        <tbody>
        <?php
      if(isset($_POST['show'])){
        $dep = $_POST['dep'];
        $batch = $_POST['batch'];
        $count = 0;
    $rcv = "SELECT * FROM student WHERE course='$dep' AND batch='$batch' ORDER BY roll_no";
    $rst = $con->query($rcv);
    for($s=1;$line = $rst->fetch_assoc();$s++){
    ?>
    
          <tr>
            <td><?php echo $s;?></td>
            <td><?php echo $line['course'];?></td>
            <input type="hidden" value="<?php echo $line['course'];?>" name="course[]">
            <td><?php echo $line['batch'];?></td>
            <input type="hidden" value="<?php echo $line['batch'];?>" name="batch[]">
            <td><?php echo $line['name'];?></td>
            <input type="hidden" value="<?php echo $line['name'];?>" name="name[]">
            <td><?php echo $line['roll_no'];?></td>
            <input type="hidden" value="<?php echo $line['roll_no'];?>" name="roll[]">
            <td><img src="<?php echo $line['image'];?>" height='70' width='70' alt=""></td>
            <input type="hidden" value="<?php echo $line['image'];?>" name="image[]">
            <td>
                <input type="radio" name="status[<?php echo $count; ?>]" value="Present" required>Prasent
                <input type="radio" name="status[<?php echo $count; ?>]" value="Absent" required>Absent
            </td>
          </tr>
        </tbody>
        <?php 
        $count++;
      }} 
      ?>
      </table>
      <button name="submit" class="btn">Take Attendence</button>
      
      </form>
      <a href="select_student_atten.php"><button name="submit" class="btn">Go Back</button></a>
      </center>
      
</body>
</html>