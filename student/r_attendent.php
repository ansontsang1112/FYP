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

$cIDM = array();
$clIDM = array();
$searchArray = array();
$queryResultArray = array();

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

function button_form_manager($weeks,$startTime,$endTime,$cID,$classID) {
	
	$timeNow = date("h:i:sa");
	//$timeNow = date("13:25");
	
	$wdk = date("l", strtotime(date("d-M-Y")));
	$converedTime = date("H:i", strtotime($timeNow));
	$lateCounter = date("H:i",strtotime('+10 minutes',strtotime($startTime)));
	
	if($weeks == $wdk) {
		if($converedTime < $startTime || $converedTime > $endTime) {
			return '<button type="submit" class="btn btn-danger">⏲</button>';
			} else if($converedTime >= $startTime && $converedTime <= $lateCounter) {
				return '<button type="submit" class="btn btn-success" onClick="window.location.href=\'../backend/dataManagement/student_attend_management.php?cID='. $cID . '&classID=' . $classID . '&stratTime=' . $startTime .'\';">🕘</button>';
				} else if($converedTime >= $lateCounter && $converedTime <= $endTime) {
					return '<button type="submit" class="btn btn-warning" onClick="window.location.href=\'../backend/dataManagement/student_attend_management.phpcID='. $cID . '&classID=' . $classID . '&stratTime=' . $startTime . '\';">⏰</button>';
				}	
	} else {
		return '<button type="submit" class="btn btn-danger">⏲</button>';
	}
}

if(count($cIDM) > 0) {
	for($i = 0; $i < count($cIDM); $i++) {
		$searchArray2[$i] = $conn->query("SELECT * FROM ClassMgr WHERE cID = '$cIDM[$i]' AND classID = '$clIDM[$i]' AND tWeek = '$weekDayManager'");
	}
}
?>

<html lang="en">

<script type="text/javascript"> 
function display_c(){
var refresh=1000;
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
}
</script>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Attendance - Hong Kong Primary School Attendance System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="../css/calendar.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//cdn.hypernology.com/css/hrms.css" rel="stylesheet">
  

</head>

<body onload=display_ct();>

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
          <li class="nav-item">
            <a class="nav-link" href="t_table.php">Time Table</a>
          </li>
          <li class="nav-item active">
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
		<img class="card-img-top" src="../images/timeAttendance.gif">
		<div class="card-body">
		<h2 class="card-title"><?php echo $sid;?> - Attendance Management</h2>
		<table style="width:100%" class="table"><thead><tr><th scope="col">#</th><th>Class ID</th><th>Strat Time</th><th>End Time</th><th>Actions</th></tr></thead><tbody>
	    <?php
		if(count($cIDM) > 0) {
		    for($i = 0; $i < count($cIDM); $i++) {
				$getWeek = $queryResultArray[$i]["tWeek"];	
                $startTime = $queryResultArray[$i]["tTime"];
				$endTime = $queryResultArray[$i]["eTime"];
				$cID = $queryResultArray[$i]["cID"];
				$classID = $queryResultArray[$i]["classID"];
				echo "<tr><th scope=\"row\">".$queryResultArray[$i]["cID"]."</th><th>".$queryResultArray[$i]["classID"]."</th><th>".$queryResultArray[$i]["tTime"]."</th><th>".$queryResultArray[$i]["eTime"]."</th><th>". button_form_manager($getWeek,$startTime,$endTime,$cID,$classID) ."</th>";
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
			Todays Weeks-Days: <strong><?php echo $_SESSION['weekDayManager']; ?></strong></p>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Your Courses</h5>
          <div class="card-body">
            <div class="row">
					<table style="width:100%" class="table"><thead><tr><th scope="col">☆</th><th>⛪</th><th>☣</th></tr></thead><tbody>
	    <?php		
		if(count($cIDM) > 0) {
		    for($i = 0; $i < count($cIDM); $i++) {
				$getCID = $queryResultArray[$i]["cID"];
				$getPlace = $conn->query("SELECT Place FROM CoursesMgr WHERE cID='$getCID'");
				$placeResult = $getPlace->fetch_assoc();			
				echo "<tr><th scope=\"row\">".$queryResultArray[$i]["cID"]."</th><th>".$placeResult["Place"]."</th><th>".$queryResultArray[$i]["tWeek"]."</th>";
			}
		}
		?>
		</table>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Time Now</h5>
          <div class="card-body">
            <div class="row">
			<span id='ct' align="center"></span>			
            </div>
          </div>
          </div>
        </div>

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
