<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image\attendence.png" type="image/x-icon">
    <title>Select Staff</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .login-form{
        margin-left: 15%;
    }
    div.login-form form div.input-field select {
  background-color: #f2f4f6;
  padding: 10px;
  border: none;
  width: 100%;
  padding-left: 15px;
}
</style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="login-form">
    <h2>TAKE ATTENDANCE</h2>
    <form action="staff_attendence.php" method="POST">
    <div class="input-field">
            <i class="bx bx-book-content"></i>
            <!-- <input type="text" placeholder="Username" name="name"> -->
            <select name="deg" id="" required>
                <option value="" disable select>Select Designation</option>
                <?php
                $sel = "SELECT * FROM designation";
                $rst = $con->query($sel);
                while($row = $rst->fetch_assoc()){
                    echo "<option value='".$row['deg_name']."'>".$row['deg_name']."</option>";
                }
                ?>
              </select>
        </div>
        
            <button name="show">TAKE</button>

    </form>
</div>