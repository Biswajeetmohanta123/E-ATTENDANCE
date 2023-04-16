<?php
include 'connection.php';
session_start();
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $psw = $_POST['psw'];

    if($con->connect_error){
        die ("connection error $con");
    }else{
        $sql = "SELECT * FROM admin";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        if($name == $row['user_name']){
            if($psw == $row['psw']){
                $_SESSION['admin'] = $name;
                ?>
                <script>
                    alert('Login Successfull');
                    window.location = 'index.php';
                </script>
                <?php 
            }else{
                ?>
        <script>
        alert('Invalid Password');
        </script>
        <?php
            }
            
        }else{
            ?>
    <script>
        alert('Invalid User Name');
    </script>
    <?php
        }
    }
}

?>

<html>
<head>
<link rel="icon" href="image\attendence.png" type="image/x-icon">
<title>Login</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form action="" method="POST">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Username" name="name" required>
        </div>
        <div class="input-field">
            <i class="bi bi-shield-lock"></i>
            <input type="password" placeholder="Password" name="psw" required>
        </div>
        
        <button type="submit" name="submit">Login</button>

    </form>
</div>

</body>
</html>