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
  $del = "DELETE FROM staff WHERE id=$id";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image\attendence.png" type="image/x-icon">
    <title>Staff table</title>
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
            <th>Course</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
       
        <tbody>
        <?php
      if(isset($_POST['show'])){
        $deg = $_POST['deg'];
        
    $rcv = "SELECT * FROM staff WHERE deg_name='$deg'";
    $rst = $con->query($rcv);
    for($s=1;$line = $rst->fetch_assoc();$s++){
    ?>
    
          <tr>
            <td><?php echo $s;?></td>
            <td><?php echo $line['deg_name'];?></td>
            <td><?php echo $line['name'];?></td>
            <td><?php echo $line['email'];?></td>
            <td><?php echo $line['contact'];?></td>
            <td><img src="<?php echo $line['image'];?>" height='70' width='70' alt=""></td>
            <td>
            <form action="staff_table.php" method="POST">
            <input type="hidden" name="row_id" value="<?php echo $line['id'];?>">
                <input type="submit" name="dl_btn" value="Delete"class="btn">
            </form>
            </td>
            <td>
            <form action="staff.php" method="POST">
            <input type="hidden" name="edit_id" value="<?php echo $line['id'];?>" >
                <input type="submit" name="edit" value="Edit" class="btn">
            </form>
            </td>
          </tr>
        </tbody>
        <?php }} ?>
      </table>
      <a href="select_staff.php"><button name="submit" class="btn" style="margin-top:20px;">Go Back</button></a>
      </center>
</body>
</html>