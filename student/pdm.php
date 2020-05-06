<!DOCTYPE html>
<?php
session_start();
include_once('../backend/mysql/connection.php');
include_once('../assert/assert.php');

if(!isset($_SESSION["isStudentLogin"])) {
	header('Location: ../index.php');
}

$sid = $_SESSION['student_id'];

$requestPersonData = $conn->query("SELECT * FROM student_records WHERE studentid='$sid'");
$getPersonalResult = $requestPersonData->fetch_assoc();

$CoursesMgr = $conn->query("SELECT * FROM student_courses_info WHERE studentid = '$sid'");
$CoursesMgr2 = $conn->query("SELECT * FROM CoursesMgr");

$sysid = uniqid();

if($_GET['changepassword'] != null) {
	$new_pw = $_POST['newPW'];
	if($new_pw != null) {
		$sql = "UPDATE student_records SET password='$new_pw' WHERE studentid='$sid'";
		$conn->query($sql);
	}
}

?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student Personal Data Management - Hong Kong Primary School Attendance System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
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
          <li class="nav-item">
            <a class="nav-link" href="t_table.php?date=<?php echo date("Y-m-d");?>&sid=<?php echo $sid?>">Time Table</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="r_attendent.php">Report Attendants</a>
          </li>
          <li class="nav-item active">
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
        <h1 class="my-4">Hong Kong Primary School (HKPS)<br>
          <small>Attendance System(AS)</small>
        </h1>

        <!-- Blog Post -->
		
		<div class="panel panel-primary">
		<form action="?changepassword=true" method="post">
		<label><strong>Change Your Own Password</strong></label>
        <div class="form-row">
        <div class="form-group col-md-5">
        <input type="text" class="form-control" id="newPW" name="newPW" placeholder="Enter Your New Password">
        </div>
		<div class="form-group col-md-7">
        <button type="submit" class="btn btn-primary">Change Pwd for ID: <?php echo $_SESSION['student_id'];?></button>
        </div>
		</div>
        </form>
        </div>	
		
		<br>
		
		<div class="panel panel-primary">
		<label><strong>Update Yours [ <?php echo $_SESSION['student_id']; ?> ] Records</strong></label>
		<form  name="VWLR" action="../backend/dataManagement/update_student_record.php" method="post">
		<div class="form-row">
		
		<div class="form-group col-md-4">
		<label><strong>System ID</strong></label>
        <input type="text" class="form-control" value="<?php echo $getPersonalResult["sysid"]?>" disabled>
        </div>
	    <div class="form-group col-md-4">
		<label><strong>Student ID</strong></label>
        <input type="text" class="form-control" value="<?php echo $getPersonalResult["studentid"]?>" disabled>
        </div>
	    <div class="form-group col-md-4">
		<label><strong>Student Name</strong></label>
        <input type="text" class="form-control" id="s_name" name="s_name" value="<?php echo $getPersonalResult["studentName"]?>">
        </div>
		
        </div>
		
		<div class="form-row">
		
	    <div class="form-group col-md-12">
		<label><strong>Courses & Class ID</strong></label>
        <input type="text" class="form-control" value="<?php echo $getPersonalResult["ccID"]?>" disabled>
        </div>
		</div>
		<div class="form-row">
	    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Update For ID: <?php echo $_SESSION['student_id'];?></button>
        </div>
		</div>
		</form>
		</div>
		
		<div class="panel panel-primary">
		<label><strong>Late Attendance [ <?php echo $_SESSION['student_id']; ?> ] Report</strong></label>
		<form  name="VWLR" action="../backend/dataManagement/late_attends_report.php?sysid=<?php echo $sysid;?>" method="post">
		<div class="form-row">
		
		<div class="form-group col-md-4">
		<label><strong>System ID</strong></label>
        <input type="text" class="form-control" value="<?php echo $sysid?>" disabled>
        </div>
	    <div class="form-group col-md-4">
		<label><strong>Student ID</strong></label>
        <input type="text" class="form-control" value="<?php echo $getPersonalResult["studentid"]?>" disabled>
        </div>
	    <div class="form-group col-md-4">
		<label><strong>Late Lesson</strong></label>
	    <select class="custom-select" id="basic" name="lLesson">
        <?php
        if($CoursesMgr->num_rows > 0) {
			while($row = $CoursesMgr->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["cID"]."-".$row["classID"]."\">".$row["cID"]."-".$row["classID"]."</option>";
			}
		}	
	    ?>
	    </select>
        </div>
		
        </div>
		
		<div class="form-row">
		
	    <div class="form-group col-md-12">
		<label><strong>Late Reason (Report)</strong></label>
		<textarea name="reason" rows="4" cols="50" class="form-control">
		</textarea>
        </div>
		</div>
		<div class="form-row">
	    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Submite Late Attendance Report / Report ID: <?php echo $sysid;?></button>
        </div>
		</div>
		</form>
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
          <h5 class="card-header">Cources Code Details</h5>
          <div class="card-body">

		  <?php
		  	  if ($CoursesMgr2->num_rows > 0) {	  
	  echo "<table class=\"table\"> <thead class=\"thead-dark\"><tr><th scope=\"col\">#</th><th scope=\"col\">cName</th></tr></thead><tbody>";
	  while($row = $CoursesMgr2->fetch_assoc()) {
		  echo "<tr><th scope=\"row\">".$row["cID"]."</th><th>".$row["cName"]."</th>";
	  }
	  echo "</tbody></table>";
	  } else {
		  echo "<table class=\"table\"> <thead class=\"thead-dark\"> <tr> <th scope=\"col\">#</th> <th scope=\"col\">cName</th></tr></thead><tbody>";
		  echo "<tr><th scope=\"row\">N/A</th><td>N/A</td>";
		  echo "</tbody></table>";
	  }
	  $conn->close();
	  ?>
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
	<?php echo footer();?>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="//cdn.hypernology.com/jquery/jquery.min.js"></script>
  <script src="//cdn.hypernology.com/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
