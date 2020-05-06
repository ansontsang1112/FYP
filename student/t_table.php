<!DOCTYPE html>
<?php
session_start();
include_once("../assert/assert.php");
include_once("../backend/mysql/connection.php");

if(!isset($_SESSION["isStudentLogin"])) {
	header('Location: ../index.php');
}

$sid = $_SESSION['student_id'];
$weekDayManager = date("l", strtotime(date("d-M-Y")));
//$weekDayManager = date("l", strtotime(date("5-5-2020")));
$cIDM = array();
$clIDM = array();
$searchArray = array();
$queryResultArray = array();

$cIDM2 = array();
$clIDM2 = array();
$searchArray2 = array();
$queryResultArray2 = array();

$getAllCourcesAreStudying = $conn->query("SELECT * FROM student_courses_info WHERE studentid = '$sid'");
if($getAllCourcesAreStudying->num_rows > 0) {
	while($row = $getAllCourcesAreStudying->fetch_assoc()) {
		array_push($cIDM, $row['cID']);
		array_push($clIDM, $row['classID']);
	}
}	

if(count($cIDM) > 0) {
	for($i = 0; $i < count($cIDM); $i++) {
		$searchArray[$i] = $conn->query("SELECT * FROM ClassMgr WHERE cID = '$cIDM[$i]' AND classID = '$clIDM[$i]'");
	}
}

if(count($cIDM) > 0){
	for($i = 0; $i < count($cIDM); $i++) {
		$queryResultArray[$i] = $searchArray[$i]->fetch_assoc();
	}
}

if(count($cIDM) > 0) {
	for($i = 0; $i < count($cIDM); $i++) {
		$searchArray2[$i] = $conn->query("SELECT * FROM ClassMgr WHERE cID = '$cIDM[$i]' AND classID = '$clIDM[$i]' AND tWeek = '$weekDayManager'");
	}
}

if(count($cIDM) > 0){
	for($i = 0; $i < count($searchArray2); $i++) {
		$queryResultArray2[$i] = $searchArray2[$i]->fetch_assoc();
	}
}

?>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Time Table - Hong Kong Primary School Attendance System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="../css/calendar.css" type="text/css" rel="stylesheet" />
 

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
          <li class="nav-item">
            <a class="nav-link" href="../student.php">HKPS
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="t_table.php">Time Table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="r_attendent.php">Report Attendants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pdm.php">Personal Data Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
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
		<img class="card-img-top" src="../images/time_table.gif">
		<div class="card-body">
		<h2 class="card-title">Full Time Table (Monday to Sunday)</h2>
		<table style="width:100%" class="table"><thead><tr><th scope="col">#</th><th>Class ID</th><th>Strat Time</th><th>End Time</th><th>Venue</th><th>Week Dates</th></tr></thead><tbody>
	    <?php
		if(count($cIDM) > 0) {
		    for($i = 0; $i < count($cIDM); $i++) {
				$getCID = $queryResultArray[$i]["cID"];
				$getPlace = $conn->query("SELECT Place FROM CoursesMgr WHERE cID='$getCID'");
				$placeResult = $getPlace->fetch_assoc();
				
				echo "<tr><th scope=\"row\">".$queryResultArray[$i]["cID"]."</th><th>".$queryResultArray[$i]["classID"]."</th><th>".$queryResultArray[$i]["tTime"]."</th><th>".$queryResultArray[$i]["eTime"]."</th><th>".$placeResult["Place"]."</th><th>".$queryResultArray[$i]["tWeek"]."</th>";
			}
		}
		?>
		</table>
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
			Todays Weeks-Days: <strong><?php echo $_SESSION['weekDayManager']; ?><strong></p>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Todays Courses</h5>
          <div class="card-body">
            <div class="row">
			  <table style="width:100%" class="table"><thead><tr><th scope="col">#</th><th>Class ID</th><th>Strat Time</th><th>Venue</th></tr></thead><tbody>
	          <?php
		      if(count($searchArray2) > 0) {
				  for($i = 0; $i < count($searchArray2); $i++) {
					 $getCID = $queryResultArray2[$i]["cID"];
					 $getPlace = $conn->query("SELECT Place FROM CoursesMgr WHERE cID='$getCID'");
					 $placeResult = $getPlace->fetch_assoc();		
				     echo "<tr><th scope=\"row\">".$queryResultArray2[$i]["cID"]."</th><th>".$queryResultArray2[$i]["classID"]."</th><th>".$queryResultArray2[$i]["tTime"]."</th><th>".$placeResult["Place"]."</th>";
				}
		     } else {
				 echo "No Lesson For Today ( ".$weekDayManager." ). Have a nice rest :)";
			 }
		     ?>
		     </table>
			
			
            </div>
          </div>
        </div>
		</div>
</div>
        <!-- Side Widget -->
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
