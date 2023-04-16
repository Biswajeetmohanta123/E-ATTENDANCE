<?php
/******************* Connection With Database *******************/
$host = "localhost";
$dbuser = "root";
$psw ="";
$dbname = "attendence_db";

$con = mysqli_connect($host, $dbuser, $psw, $dbname);

if(!$con){
    ?>
    <script>
        alert('Somthing Error');
    </script>
    <?php
}

?>