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
    <title>Batch</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .login-form{
        margin-left: 15%;
    }
</style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="login-form">
    <h2>ADD BATCH</h2>
    <form action="" method="POST">
        <div class="input-field">
            <i class="bi-bookmark-check-fill"></i>
            <input type="text" placeholder="Enter Your Batch" name="batch" required>
        </div>
        <!-- <div class="input-field">
            <i class="bi-bookmark-dash"></i>
            <input type="text" placeholder="Enter Your Batch" name="batch">
        </div> -->
        
        <button type="submit" name="add">ADD</button>

    </form>
</div>
<?php
if(isset($_POST['add'])){
    $batch = $_POST['batch'];

    if($con->connect_error){
        die ("connection error $con");
    }else{
        $sql = "INSERT INTO batch(batch_name) VALUES ('$batch')";
    }
    if($con->query($sql) == TRUE){
        ?>
        <script>
            alert("Batch is Add");
            window.location = 'index.php';
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Something Error");
        </script>
        <?php
    }
}
?>
</body>
</html>