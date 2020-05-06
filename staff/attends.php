<!DOCTYPE html>
<?php
session_start();
include_once('../backend/mysql/connection.php');
include_once('../assert/assert.php');

if(!isset($_SESSION["isStaffLogin"])) {
	header('Location: ../index.php');
}

/////////////////////////////////////////////////////////
$timeArray = array();
$lateArray = array();
$classArray = array();
$coursesArray = array();
$timeEArray = array();

$staffid = $_SESSION["username"];

$weekDayManager = date("l", strtotime(date("d-M-Y")));
//$weekDayManager = "Friday";

$timeNow = date("h:i:sa");
//$timeNow = date("8:41");
$converedTime = date("H:i", strtotime($timeNow));

$getFromClassDB = $conn->query("SELECT * FROM ClassMgr WHERE tWeek='$weekDayManager'");
if($getFromClassDB->num_rows > 0) {
	while($row = $getFromClassDB->fetch_assoc()) {
		array_push($classArray, $row['classID']);
		array_push($timeArray, $row['tTime']);
		array_push($timeEArray, $row['eTime']);
		array_push($coursesArray, $row['cID']);
		array_push($lateArray, (date("H:i",strtotime('+11 minutes',strtotime($row['tTime'])))));
	}
}

for($i = 0; $i < count($coursesArray); $i++) {
	if($lateArray[$i] > $converedTime && $converedTime < $timeEArray[$i]) {
	//if(time() > strtotime($timeArray[$i]) and time() < strtotime($timeEArray($timeEArray[$i]))) {
		continue;
	} else {
		$getCourcesEric = $conn->query("SELECT * FROM student_courses_info WHERE cID='$coursesArray[$i]' AND classID='$classArray[$i]'");
		if($getCourcesEric->num_rows > 0) {
			while($row = $getCourcesEric->fetch_assoc()) {
				$sidd = $row['studentid'];
				$attend_result = $conn->query("SELECT * FROM attendent_info WHERE studentid='$sidd' AND cID='$coursesArray[$i]' AND classID='$classArray[$i]'");
		        if($attend_result->num_rows > 0) {
					continue;
				} else {
					$status = "Absent";	
					$regTime = "N/A";	
					$ssid = uniqid();
					$conn->query("INSERT INTO attendent_info (sysid, studentid, cID, classID, regTime, status) VALUES ('$ssid', '$sidd', '$coursesArray[$i]', '$classArray[$i]', '$regTime', '$status')");
				}	
			}
		}
	}		
}

////////////////////////////////////////////////////////

$sql = "";
$query = "";
$result = "";
$f = "Okay";

if($_SESSION['dept'] == "Executive" || $_SESSION['dept'] == "IT Department") {
	$getSLAP = $conn->query("SELECT * FROM student_late_attendent_report");
	
	$sql = "SELECT * FROM attendent_info";
	$query = $conn->query($sql);
} else if($_SESSION['dept'] == "Teaching Department") {
	$getSLAP = $conn->query("SELECT * FROM student_late_attendent_report");
	
	$getCIDforTeacher = $conn->query("SELECT * FROM staff_records WHERE staffid='$staffid'");
	$queryResultforTeacher = $getCIDforTeacher->fetch_assoc();	
	
	$cID = $queryResultforTeacher['cID'];
	
	$sql = "SELECT * FROM attendent_info WHERE cID='$cID'";
	$query = $conn->query($sql);
}

$CoursesMgr = $conn->query("SELECT * FROM CoursesMgr");
$CoursesMgr2 = $conn->query("SELECT * FROM CoursesMgr");

function button_form_manager($sysid) {
	return '<button type="submit" class="btn btn-info" onClick="window.location.href=\'../backend/dataManagement/student_attend_modify.php?sysid='. $sysid .'&action=modify\';">✎</button>'. '&nbsp;' .
	'<button type="submit" class="btn btn-info" onClick="window.location.href=\'../backend/dataManagement/student_attend_modify.php?sysid='. $sysid .'&action=delete\';">🗑</button>';
}

function button_form_manager2($ccID,$sid) {
	return '<button type="submit" class="btn btn-success" onClick="window.location.href=\'../backend/dataManagement/student_abs_modify.php?ccID='. $ccID .'&sid='. $sid .'&action=approve\';">✔</button>'. '&nbsp;' .
	'<button type="submit" class="btn btn-danger" onClick="window.location.href=\'../backend/dataManagement/student_abs_modify.php?ccID='. $ccID .'&sid='. $sid .'&action=deny\';">✖</button>';
}

foreach($conn->query("SELECT COUNT(*) FROM attendent_info") as $row) {
	$total = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM attendent_info WHERE status='On Time'") as $row) {
	$onTime = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM attendent_info WHERE status='Late'") as $row) {
	$late = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM attendent_info WHERE status='Absent'") as $row) {
	$absent = $row['COUNT(*)'];
}

?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Attendance Management - Hong Kong Primary School Attendance System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="//cdn.hypernology.com/css/hrms.css" rel="stylesheet">
  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">HKPS. AS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../staff.php">HKPS
            </a>
          </li>
		  <li class="nav-item active">
            <a class="nav-link" href="attends.php">Attends Management</a>
		    <span class="sr-only">(current)</span>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff_m.php">Staff Records Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="student_m.php">Student Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="cac_m.php">C&C Management</a>
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
        <h1 class="my-4">Hong Kong Primary School(HKPS)<br>
          <small> Attendance System(AS)</small>
        </h1>

        <!-- Blog Post -->
	  <div class="panel-body" align="center">
      <?php
	  if ($getSLAP->num_rows > 0) {	  
	  echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">Student ID</th><th scope=\"col\">Late CCID</th><th scope=\"col\">Reason</th><th scope=\"col\">Actions</th></tr></thead><tbody>";
	  while($row = $getSLAP->fetch_assoc()) {
		  echo "<tr><th scope=\"row\"><a href=\"#\"</a>".$row["studentid"]."</th><td>".$row["late_courses"]."</td><td>".$row["reason"]."</td><td>". button_form_manager2($row["late_courses"],$row["studentid"]) . "</td>";
	  }
	      echo "</tbody></table>";
	  } else {
          echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">Student ID</th><th scope=\"col\">Late CCID</th><th scope=\"col\">Reason</th><th scope=\"col\">Actions</th></tr></thead><tbody>";
		  echo "<tr><th scope=\"row\">0</th><td>0</td><td>No Record Found</td><td>No Record Found</td>";
		  echo "</tbody></table>";
	  }
	  ?>	  
	  </tbody>
	  </div>

		
	  <div class="panel-body" align="center">
      <?php
	  if ($query->num_rows > 0) {	  
	  echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">Student ID</th><th scope=\"col\">Coueses ID</th><th scope=\"col\">Class ID</th><th scope=\"col\">Register Time</th><th scope=\"col\">Status</th><th scope=\"col\">Actions</th></tr></thead><tbody>";
	  while($row = $query->fetch_assoc()) {
		  echo "<tr><th scope=\"row\"><a href=\"#\"</a>".$row["studentid"]."</th><td>".$row["cID"]."</td><td>".$row["classID"]."</td><td>".$row["regTime"]."</td><td>".$row["status"]."</td><td>". button_form_manager($row["sysid"]) . "</td>";
	  }
	  echo "</tbody></table>";
	  } else {
		  	  echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">Student ID</th><th scope=\"col\">Coueses ID</th><th scope=\"col\">Class ID</th><th scope=\"col\">Register Time</th><th scope=\"col\">Status</th><th scope=\"col\">Actions</th></tr></thead><tbody>";
		  echo "<tr><th scope=\"row\">0</th><td>0</td><td>No Record Found</td><td>No Record Found</td><td>No Record Found</td>";
		  echo "</tbody></table>";
	  }
	  ?>
	  </tbody>
	  </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Your Information</h5>
          <div class="card-body">
            <div class="input-group">
			<p>Welcome <?php echo $_SESSION["username"]; ?>.<br>
			You belongs to <strong><?php echo $_SESSION["dept"];?></strong><br>
			Your Role is <strong><?php echo $_SESSION['role'];?></strong>
			<br>Current Date Time: <strong><?php echo date("y/m/d") . " | " . date("h:i"); ?></strong><br></p>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Cources Code Details</h5>
          <div class="card-body">

		  <?php
		  	  if ($CoursesMgr->num_rows > 0) {	  
	  echo "<table class=\"table\"> <thead class=\"thead-dark\"><tr><th scope=\"col\">#</th><th scope=\"col\">cName</th></tr></thead><tbody>";
	  while($row = $CoursesMgr->fetch_assoc()) {
		  echo "<tr><th scope=\"row\">".$row["cID"]."</th><th>".$row["cName"]."</th>";
	  }
	  echo "</tbody></table>";
	  } else {
		  echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">#</th> <th scope=\"col\">cName</th></tr></thead><tbody>";
		  echo "<tr><th scope=\"row\">N/A</th><td>N/A</td>";
		  echo "</tbody></table>";
	  }
	  ?>
            </div>
          </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Attendance Stats</h5>
          <div class="card-body">
            <p>On Time Rate:&nbsp;<?php echo ($onTime/$total)*100 . "%";?></p>
			<p>Late Rate:&nbsp;<?php echo ($late/$total)*100 . "%";?></p>
			<p>Absent Rate:&nbsp;<?php echo ($absent/$total)*100 . "%";?></p>
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
	<?php echo footer();?>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="//cdn.hypernology.com/jquery/jquery.min.js"></script>
  <script src="//cdn.hypernology.com/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
