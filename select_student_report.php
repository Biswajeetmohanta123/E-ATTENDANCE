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
    <title>Select Student Attendance Report</title>
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
    <h2>SHOW DATA</h2>
    <form action="student_attendence_report.php" method="POST">
    <div class="input-field">
            <i class="bx bx-book-content"></i>
            <!-- <input type="text" placeholder="Username" name="name"> -->
            <select name="dep" id="" required>
                <option value="" disable select>Select Course</option>
                <?php
                $sel = "SELECT * FROM course";
                $rst = $con->query($sel);
                while($row = $rst->fetch_assoc()){
                    echo "<option value='".$row['dep_name']."'>".$row['dep_name']."</option>";
                }
                ?>
              </select>
        </div>
        <div class="input-field">
            <i class="bi-bookmark-check-fill"></i>
            <!-- <input type="password" placeholder="Password" name="psw"> -->
            <select name="batch" id="" required>
                <option value="" disable select>Select Batch</option>
                <?php
                $sel = "SELECT * FROM batch";
                $rst = $con->query($sel);
                while($row = $rst->fetch_assoc()){
                    echo "<option value='".$row['batch_name']."'>".$row['batch_name']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="input-field">
            <i class="bx bi-calendar-date-fill"></i>
            <input type="date" name="date" required>
            </div>
            <button name="show">SHOW</button>

    </form>
</div>