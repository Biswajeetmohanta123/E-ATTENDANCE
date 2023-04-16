<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
if(isset($_POST["edit"])){
    // require_once('connection.php');
    $id = $_POST['edit_id'];
    if($con->connect_error){
        die("connection error: " .$con->connect_error);
    }else{
        $sel = "SELECT * FROM staff WHERE id=$id";
        $result = $con->query($sel);
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $deg = $row['deg_name'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['contact'];
        $sv_b_v = "UPDATE";
        $sv_b_nm = "update";
        $head = "UPDATE STAFF";
    }
}else{
    $id = "";
    $deg = "";
    $name = "";
    $email = "";
    $mobile = "";
    $sv_b_v = "ADD";
    $sv_b_nm = "submit";
    $head = "ADD STAFF";
}  

if(isset($_POST['update'])){
    // require_once("connection.php");
    $id = $_POST['id'];
    $deg = $_POST['deg'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $allow_extension = array("jpg","png","jpeg","JPG");
    $file_extension = pathinfo($_FILES['upimage']['name'],PATHINFO_EXTENSION);
    if(!file_exists($_FILES['upimage']['tmp_name'])){
        echo "<script>alert('please upload image')</script>";
    }else if(!in_array($file_extension,$allow_extension)){
        echo "<script>alert('please upload valid type of image jpg,png,jpeg')</script>";
    }else if($_FILES['upimage']['size']>500000){
        echo "<script>alert('please enter size of image under 500kb')</script>";
    }else{
    $filename = $_FILES['upimage']['name'];
    $tempname = $_FILES['upimage']['tmp_name'];
    $folder = "photo/".$filename;
    move_uploaded_file($tempname,$folder);
}

if($con->connect_error){
    die ("connection error: " .$con->connect_error);
}else{
    $edt = "UPDATE staff SET deg_name ='$deg', name ='$name',
    email ='$email', contact ='$mobile', image ='$folder' WHERE id=$id";
}
if($con->query($edt) == TRUE){
    ?>
    <script>
        alert("Update Sucessfull");
        window.location='index.php';
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

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image\attendence.png" type="image/x-icon">
    <title><?php echo "$head" ?></title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"
    />
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
    <h2><?php echo "$head" ?></h2>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type ="hidden" name="id" placeholder="ID" value="<?php echo $id;?>">
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
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Enter Name" name="name" required value="<?php echo $name; ?>">
        </div>
        <div class="input-field">
            <i class="bx bx-message-alt-dots"></i>
            <input type="text" placeholder="Enter Email" name="email" required value="<?php echo $email; ?>">
        </div>
        <div class="input-field">
            <i class="bi bi-phone"></i>
            <input type="text" placeholder="Enter Mobile Number" name="mobile" required value="<?php echo $mobile; ?>">
        </div>
        <div class="input-field">
            <i class="bx bx-images"></i>
            <input type="file" name="upimage" required>
        </div>
        
        <button type="submit" name="<?php echo $sv_b_nm; ?>"><?php echo $sv_b_v;?></button>

    </form>
</div>

<?php

if(isset($_POST['submit'])){
    $deg = $_POST['deg'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $allow_extension = array("jpg","png","jpeg","JPG");
            $file_extension = pathinfo($_FILES['upimage']['name'],PATHINFO_EXTENSION);
            if(!file_exists($_FILES['upimage']['tmp_name'])){
                echo "<script>alert('please upload image')</script>";
            }else if(!in_array($file_extension,$allow_extension)){
                echo "<script>alert('please upload valid type of image jpg,png,jpeg')</script>";
            }else if($_FILES['upimage']['size']>500000){
                echo "<script>alert('please enter size of image under 500kb')</script>";
            }else{
            $filename = $_FILES['upimage']['name'];
            $tempname = $_FILES['upimage']['tmp_name'];
            $folder = "photo/".$filename;
            move_uploaded_file($tempname,$folder);
        }
        if($con->connect_error){
            die ("connection error $con");
    }else{
        $sql = "INSERT INTO staff(deg_name, name, email, contact, image) 
        VALUES ('$deg','$name','$email','$mobile','$folder')";
    }
    if($con->query($sql) == TRUE){
        ?>
        <script>
            alert("Your Data is Submit");
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

?>

</body>
</html>