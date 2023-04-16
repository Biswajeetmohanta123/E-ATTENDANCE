<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}


if(isset($_POST['submit'])){
  foreach($_POST['status'] as $id=>$status){
    $deg = $_POST['deg'][$id];
    $name = $_POST['name'][$id];
    $image = $_POST['image'][$id];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    
    $sql = "INSERT INTO staff_attendence(deg_name,name,image,status,date) VALUES ('$deg','$name','$image','$status','$date')";

    if($con->query($sql) == TRUE){
      ?>
      <script>
          alert("Attendence Sucessfull Get");
          window.location='select_staff_atten.php';
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
    <title>Staff Attendance</title>
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
    
      <form action="staff_attendence.php" method="POST">
    <table class="content-table" style="width: 80%; margin-left:10px;">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Designation</th>
            <th>Name</th>
            <th>Image</th>
            <th>Take Attendence</th>
          </tr>
        </thead>
       
        <tbody>
        <?php
      if(isset($_POST['show'])){
        $deg = $_POST['deg'];
        $count = 0;
    $rcv = "SELECT * FROM staff WHERE deg_name ='$deg'";
    $rst = $con->query($rcv);
    for($s=1;$line = $rst->fetch_assoc();$s++){
    ?>
    
          <tr>
            <td><?php echo $s;?></td>
            <td><?php echo $line['deg_name'];?></td>
            <input type="hidden" value="<?php echo $line['deg_name'];?>" name="deg[]">
            <td><?php echo $line['name'];?></td>
            <input type="hidden" value="<?php echo $line['name'];?>" name="name[]">
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
      <a href="select_staff_atten.php"><button name="submit" class="btn">Go Back</button></a>
      </center>
      
</body>
</html>