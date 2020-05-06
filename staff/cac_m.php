<!DOCTYPE html>
<?php
session_start();
include_once('../backend/mysql/connection.php');
include_once('../assert/assert.php');

if(!isset($_SESSION["isStaffLogin"])) {
	header('Location: ../index.php');
}

$CoursesMgr = $conn->query("SELECT * FROM CoursesMgr");
$CoursesMgr2 = $conn->query("SELECT * FROM CoursesMgr");
$CoursesMgr3 = $conn->query("SELECT * FROM CoursesMgr");
$ClassMgr = $conn->query("SELECT * FROM ClassMgr");

$sysid = uniqid();

foreach($conn->query("SELECT COUNT(*) FROM CoursesMgr") as $row) {
	$cmgr = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM ClassMgr") as $row) {
	$c2mgr = $row['COUNT(*)'];
}
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>C&C Management - Hong Kong Primary School Attendance System</title>

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
            <a class="nav-link" href="../staff.php">HKPS
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="attends.php">Attends Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff_m.php">Staff Records Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="student_m.php">Student Management</a>
		  </li>
		  <li class="nav-item active">
		    <a class="nav-link" href="cac_m.php">C&C Management</a>
			<span class="sr-only">(current)</span>
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
		<div class="panel panel-primary">
		<p><strong>Addition of New Courses</strong></p>
		</div>
        <div class="panel panel-primary">
		<form action="../backend/dataManagement/add_new_courses.php" method="post">
		<div class="form-row">
		<div class="form-group col-md-3">
        <label for="cou" align="center">Course ID</label>
        <input type="text" name="cou" class="form-control" placeholder="Enter the CID">
        </div>
        <div class="form-group col-md-5">
        <label for="sid" align="center">Course Name</label>
        <input type="text" name="cName" class="form-control" placeholder="Enter the CNAME">
        </div>
		<div class="form-group col-md-4">
        <label for="sid" align="center">Attends Place</label>
        <input type="text" name="ATP" class="form-control" placeholder="Enter the ATP">
        </div>
  </div>
    		<?php
		if($_SESSION['dept'] == "Executive" || $_SESSION['dept'] == "IT Department") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Submit The New Courses for Hong Kong PS</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied (Teacher are not allowed to Modify the Courses Information)</button>";
		}
		
		?>
</form>
</div>
<br>

		<div class="panel panel-primary">
		<p><strong>Addition of New Class For a Cources</strong></p>
		</div>
        <div class="panel panel-primary">
		<form action="../backend/dataManagement/add_new_class.php?sid=<?php echo $sysid;?>" method="post">
		<div class="form-row">
	    <div class="form-group col-md-3">
        <label for="classID" align="center">System ID</label>
        <input type="text" class="form-control" value="<?php echo $sysid?>" disabled>
        </div>
		<div class="form-group col-md-5">
        <label for="classID" align="center">Class ID (CLXX)</label>
        <input type="text" name="classID" class="form-control" placeholder="Enter the Class ID (Format: CLXX)">
        </div>
	    <div class="form-group col-md-4">
		<label for="cID" align="center">Courses ID</label>
	    <select class="custom-select" id="basic" name="cID">
        <?php
        if($CoursesMgr->num_rows > 0) {
			while($row = $CoursesMgr->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["cID"]."\">".$row["cID"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
		</div>
		</div>
		<div class="form-row">
		<div class="form-group col-md-4">
        <label for="sid" align="center">Start Time (24 Hours)</label>
        <input type="time" name="time" class="form-control">
        </div>
		<div class="form-group col-md-4">
        <label for="sid" align="center">End Time (24 Hours)</label>
        <input type="time" name="time2" class="form-control">
        </div>
	    <div class="form-group col-md-4">
        <label for="sid" align="center">Week Days</label>
        <select id="week_d" name="week_d" class="form-control">
        <option value="Monday">Monday</option>
		<option value="Tuesday">Tuesday</option>
		<option value="Wednesday">Wednesday</option>
		<option value="Thursday">Thursday</option>
		<option value="Friday">Friday</option>
		<option value="Saturday">Saturday</option>
		<option value="Sunday" disabled>Sunday</option>
      </select>
        </div>
        </div>
        <?php
		if($_SESSION['dept'] == "Teaching Department" || $_SESSION['dept'] == "Executive") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Submit The New Class for Hong Kong PS</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied (Only Teacher are allowed to Modify the Class Information)</button>";
		}	
		?>
</form>
</div>

<br>
		<div class="panel panel-primary">
		<form action="../backend/dataManagement/update_courses_name.php" method="post">
		<label><strong>Change the Courses Name</strong></label>
        <div class="form-row">
	    <div class="form-group col-md-6">
		<label for="cID" align="center">Select Courses ID</label>
	    <select class="custom-select" id="basic" name="cID">
        <?php
        if($CoursesMgr->num_rows > 0) {
			while($row = $CoursesMgr2->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["cID"]."\">".$row["cID"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
		</div>
        <div class="form-group col-md-6">
		<label>New Courses Name</label>
        <input type="text" class="form-control" id="newCName" name="newCName" placeholder="Insert the New Courses Name">
        </div>
        <button type="submit" class="btn btn-primary">Change the Course Name</button>
        </div>
        </form>
        </div>
        <br>	
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
		  	  if ($CoursesMgr3->num_rows > 0) {	  
	  echo "<table class=\"table\"> <thead class=\"thead-dark\"><tr><th scope=\"col\">#</th><th scope=\"col\">cName</th></tr></thead><tbody>";
	  while($row = $CoursesMgr3->fetch_assoc()) {
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
        <div class="card my-4">
          <h5 class="card-header">About the Cources Management</h5>
          <div class="card-body">
            <p>Current Number Cources:&nbsp;<?php echo $cmgr;?></p>
			<p>Current Number Class:&nbsp;<?php echo $c2mgr; ?></p>
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
