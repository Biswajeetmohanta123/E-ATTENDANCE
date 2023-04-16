<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image\attendence.png" type="image/x-icon">
    <title>Staff Attendance Report</title>
    <link rel="stylesheet" href="css/main.css">
    <style>
      th{
    text-align: center;
}
td{
    text-align: center; 
}
.btn{
  width:90px;
  height:40px;
}
    </style>
</head>
<body>
    <center>
      <div class="box">
    

    <table class="content-table" style="width: 80%; margin-left:10px;">
        <thead>
          <tr>
            <th>Sl No.</th>
            <th>Designation</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
       
        <tbody>
        <?php
      if(isset($_POST['show'])){
        $deg = $_POST['deg'];
        $date = $_POST['date'];
    $rcv = "SELECT * FROM staff_attendence WHERE deg_name ='$deg' AND date='$date'";
    $rst = $con->query($rcv);
    for($s=1;$line = $rst->fetch_assoc();$s++){
    ?>
    
          <tr>
            <td><?php echo $s;?></td>
            <td><?php echo $line['deg_name'];?></td>
            <td><?php echo $line['name'];?></td>
            <td><img src="<?php echo $line['image'];?>" height='70' width='70' alt=""></td>
            <td><?php echo $line['status'];?></td>
            <td><?php echo $line['date'];?></td>
          </tr>
        </tbody>
        <?php }} ?>
      </table>
      <a href="select_staff_report.php"><button name="submit" class="btn" style="margin-top:20px;">Go Back</button></a>
      </center>
</body>
</html>