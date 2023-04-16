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
    <title>Deshboard</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body {
    min-height: 100vh;
}
a {
    text-decoration: none;
}
li {
    list-style: none;
}
h1,
h2 {
    color: #444;
}
h3 {
    color: #999;
}
.container {
    position: absolute;
    right: 0;
    width: 80vw;
    height: 100vh;
    background: #f1f1f1;
}
.container .content {
    position: relative;
    margin-top: 1vh;
    min-height: 90vh;
    background: #f1f1f1;
}
.container .content .cards {
    padding: 20px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
.container .content .cards .card {
    width: 250px;
    height: 150px;
    background: white;
    margin: 20px 10px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
    <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <?php
                        $sql = "SELECT id FROM student ORDER BY id"; 
                        $res = mysqli_query($con,$sql);
                        $row = mysqli_num_rows($res);
                        echo '<h1> '.$row.'</h1>';
                         ?>

                        <h3>Students</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <?php
                        $sql = "SELECT id FROM staff ORDER BY id"; 
                        $res = mysqli_query($con,$sql);
                        $row = mysqli_num_rows($res);
                        echo '<h1> '.$row.'</h1>';
                         ?>
                        <h3>Teachers</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>1</h1>
                        <h3>College</h3>
                    </div>
                    <div class="icon-case">
                        <img src="image/schools.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>