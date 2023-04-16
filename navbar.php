<?php
// session_start();

if(isset($_POST['logout'])){
  session_destroy();
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Nevbar</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar close">
      <div class="logo-details">
        <i class="bx bx-book"></i>
        <span class="logo_name">E-Attendance</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a>
        </li>
        <li>
          <div class="iocn-link">
            <a href="index.php">
              <i class="bx bx-cog"></i>
              <span class="link_name">Setting</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <!-- <li><a class="link_name" href="#">Setting</a></li> -->
            <li><a href="course.php">course</a></li>
            <li><a href="batch.php">Batch</a></li>
            <li><a href="designation.php">Designation</a></li>
            <li><a href="student.php">Student</a></li>
            <li><a href="staff.php">Staff</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="index.php">
              <i class="bx bxs-report"></i>
              <span class="link_name">Report</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <!-- <li><a class="link_name" href="#">Report</a></li> -->
            <li><a href="select_student.php">Student</a></li>
            <li><a href="select_staff.php">Staff</a></li>
            <li><a href="select_student_report.php">Student attendence</a></li>
            <li><a href="select_staff_report.php">Staff attendence</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="index.php">
              <i class="bx bx-book-content"></i>
              <span class="link_name">Attendence</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <!-- <li><a class="link_name" href="#">Attendence</a></li> -->
            <li><a href="select_student_atten.php">Student</a></li>
            <li><a href="select_staff_atten.php">Staff</a></li>
          </ul>
        </li>
        <li>
          <div class="profile-details">
            <div class="profile-content">
              <img src="image/profile.jpg" alt="profileImg" />
            </div>
            <div class="name-job">
              <div class="profile_name"><?php echo $_SESSION["admin"]; ?></div>
            </div>
            <form action="" method="POST">
            <button name="logout"><i class="bx bx-log-out"></i></button>
            </form>
          </div>
        </li>
      </ul>
    </div>
    

    <script src="js/script.js"></script>
  </body>
</html>
