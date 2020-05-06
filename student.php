<!DOCTYPE html>
<?php
session_start();
include_once("assert/assert.php");
include_once("backend/mysql/connection.php");
$sid = $_SESSION['student_id'];

$weekDayManager = date("l", strtotime(date("d-M-Y")));
$getStudentInfo = $conn->query("SELECT * FROM student_records WHERE studentid='$sid'");
$queryStudentInfo = $getStudentInfo->fetch_assoc();

if(!isset($_SESSION["isStudentLogin"])) {
	header('Location: index.php');
}

if($_GET['a_login'] != null) {
	$_SESSION['student_name'] = $queryStudentInfo['studentName'];
	$_SESSION['ccID'] = $queryStudentInfo['ccID'];
	$_SESSION['weekDayManager'] = $weekDayManager;
}

?>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student Page - Hong Kong Primary School Attendance System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 

  <!-- Custom styles for this template -->
  <link href="//cdn.hypernology.com/css/hrms.css" rel="stylesheet">
  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">HKPS.AS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="student.php">HKPS
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student/t_table.php">Time Table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student/r_attendent.php">Report Attendants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="student/pdm.php">Personal Data Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Hong Kong Primary School<br>
          <small>Attendance System (AS) - Student Website</small>
        </h1>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="images/api_giphy_header.gif">
          <div class="card-body">
            <h2 class="card-title">Announcement</h2>
            <p class="card-text">This is our Attendance System for FYP .All function are well prepared .We felt happy to do that! 
			<br><br>Student System, I am Coded by Gordon Ng & Anson Tsang. SQL & OS Managed by KC Hung.</p>
          </div>
          <div class="card-footer text-muted">
            Today: <?php echo date("Y-m-d");?> | <?php echo date("h:i"); ?>
          </div>
        </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Your Information</h5>
          <div class="card-body">
            <div class="input-group">
			<p>Welcome <?php echo $_SESSION["student_id"]; ?> HKPS Student Web<br>
			<p>Full Name: <strong><?php echo $_SESSION['student_name']; ?></strong>.<br>
			You belongs to <strong>STUDENT</strong><br>Current Date Time: <strong><?php echo date("y/m/d") . " | " . date("h:i"); ?></strong><br>
			Todays Weeks-Days: <strong><?php echo $_SESSION['weekDayManager']; ?></strong></p>
            </div>
          </div>
        </div>


        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Hello World</h5>
          <div class="card-body">
		  <img class="card-img-top" src="images/hello-world.gif">
          </div>
        </div>

        <!-- Side Widget -->
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <?php footer(); ?>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="//cdn.hypernology.com/jquery/jquery.min.js"></script>
  <script src="//cdn.hypernology.com/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
