<!DOCTYPE html>
<?php
session_start();
include_once('../backend/mysql/connection.php');
include_once('../assert/assert.php');

if(!isset($_SESSION["isStaffLogin"])) {
	header('Location: ../index.php');
}

$sysid = uniqid();

$getStaffData = $conn->query("SELECT staffid FROM staff_records");
$getStaffData2 = $conn->query("SELECT staffid FROM staff_records WHERE status='On Job'");
$CoursesMgr = $conn->query("SELECT * FROM CoursesMgr");

if($_GET['changepassword'] != null) {
	$new_pw = $_POST['newPW'];
	$sid = $_SESSION['username'];
	$sql = "UPDATE staff_records SET password='$new_pw' WHERE staffid='$sid'";
	$conn->query($sql);
}

if($_GET['termination'] != null) {
	$sid = $_POST['staff_name'];
	$status = "Dismissed";
	$sql = "UPDATE staff_records SET status='$status' WHERE staffid='$sid'";
	$conn->query($sql);
	header('staff_m.php');
}

foreach($conn->query("SELECT COUNT(*) FROM staff_records") as $row) {
	$total_staff = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM staff_records WHERE status='On Job'") as $row) {
	$total_staff_OJ = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM staff_records WHERE dept='Teaching Department'") as $row) {
	$total_teacher = $row['COUNT(*)'];
}

foreach($conn->query("SELECT COUNT(*) FROM staff_records WHERE dept='IT Department'") as $row) {
	$total_IT = $row['COUNT(*)'];
}
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student Attendance Record Update - Hong Kong Primary School Attendance System</title>

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
		  <li class="nav-item active">
		    <a class="nav-link" href="staff_m.php">Staff Records Management</a>
			<span class="sr-only">(current)</span>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="student_m.php">Student Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="cac_m.php">C&C Management</a>
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
        <h1 class="my-4">Hong Kong Primary School (HKPS)<br>
          <small>Attendance System(AS)</small>
        </h1>

        <!-- Blog Post -->
		<div class="panel panel-primary">
		<p><strong>External Addition of A New Staff</strong></p>
		</div>
        <div class="panel panel-primary">
		<form action="../backend/dataManagement/add_new_staff.php?systemid=<?php echo $sysid;?>" method="post">
		<div class="form-row">
		<div class="form-group col-md-4">
        <label for="systemid" align="center">System ID</label>
        <input type="text" name="sysid" class="form-control" value="<?php echo $sysid;?>" disabled>
        </div>
        <div class="form-group col-md-4">
        <label for="sid" align="center">Staff ID</label>
        <input type="text" name="staffid" class="form-control" placeholder="Enter the Staff ID">
        </div>
		<div class="form-group col-md-4">
        <label for="sid" align="center">Staff Name</label>
        <input type="text" name="staffname" class="form-control" placeholder="Enter the Staff Name">
        </div>
  </div>
 <div class="form-row">
  <div class="form-group col-md-6">
    <label>Password</label>
    <input type="text" name="password" class="form-control" placeholder="Enter the Staff Password">
  </div>
    <div class="form-group col-md-6">
      <label for="dept">Department</label>
      <select id="dept" name="dept" class="form-control">
        <option value="Teaching Department" selected>Teaching Department</option>
		<option value="IT Department">IT Department</option>
		<option value="Executive">Executive</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="role">Role</label>
      <select id="role" name="role" class="form-control">
        <option value="FT Teacher" selected>FT Teacher</option>
		<option value="PT Teacher">PT Teacher</option>
		<option value="IT Staff">IT Staff</option>
		<option value="Principal">Principal</option>
      </select>
    </div>
	<div class="form-group col-md-6">
      <label for="courses">Courses</label>
      <select id="courses" name="courses" class="form-control">
        <?php
        if($CoursesMgr->num_rows > 0) {
			while($row = $CoursesMgr->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["cID"]."\">".$row["cID"]."</option>";
			}
		}	
	    ?>
		<option value="N/A">N/A</option>
      </select>
    </div>
	  </div>
  <button type="submit" class="btn btn-primary">Submit Staff Reason  : <?php echo $sysid; ?></button>
</form>
</div>

<br>
		<div class="panel panel-primary">
		<form action="?changepassword=true" method="post">
        <div class="form-row">
        <div class="form-group col-md-8">
        <label><strong>Change Your Own Password</strong></label>
        <input type="text" class="form-control" id="hndn" name="newPW" placeholder="Insert Your New Password">
        </div>
        <button type="submit" class="btn btn-primary">Change Pwd for ID: <?php echo $_SESSION['username'];?></button>
        </div>
        </form>
        </div>	
		
		<div class="panel panel-primary">
		<form  name="VWLR" action="data/update_staff_record.php" method="get">
		<label><strong>Update Staff Records</strong></label>
		<div class="form-row">
	    <div class="form-group col-md-6">
	    <select class="custom-select" id="basic" name="staff_data">
        <?php
        if($getStaffData->num_rows > 0) {
			while($row = $getStaffData->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["staffid"]."\">".$row["staffid"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
        </div>
		<div class="form-group col-md-4">
		<?php
		if($_SESSION['dept'] == "IT Department" || $_SESSION['dept'] == "Executive") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Process Upadate Record</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied</button>";
		}
		
		?>
		</div>
		</div>
		</form>
        </div>
		
		<div class="panel panel-primary">
		<form  name="VWLR" action="?termination=true" method="post">
		<label><strong>Termination of Staff</strong></label>
		<div class="form-row">
	    <div class="form-group col-md-6">
	    <select class="custom-select" id="basic" name="staff_name">
        <?php
        if($getStaffData2->num_rows > 0) {
			while($row = $getStaffData2->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["staffid"]."\">".$row["staffid"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
        </div>
		<div class="form-group col-md-4">
		<?php
		if($_SESSION['dept'] == "Executive") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Process Upadate Record</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied</button>";
		}
		
		?>
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
			<p>Welcome <?php echo $_SESSION["username"]; ?>.<br>
			You belongs to <strong><?php echo $_SESSION["dept"];?></strong><br>
			Your Role is <strong><?php echo $_SESSION['role'];?></strong>
			<br>Current Date Time: <strong><?php echo date("y/m/d") . " | " . date("h:i"); ?></strong><br></p>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Hot Keys</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="attends.php">Attends Management</a>
                  </li>
                  <li>
                    <a href="student_m.php">Student Management</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="cac_m.php">C&C Management</a>
                  </li>
                  <li>
                    <a href="../logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Staff Details</h5>
          <div class="card-body">
            <p>Current Staffs: <?php echo $total_staff;?></p>
			<p>Dismissed Employee: <?php echo $total_staff - $total_staff_OJ;?></p>
			<p>Dismissed Rate : <?php echo number_format((float)(($total_staff - $total_staff_OJ)/($total_staff) * 100), 2, '.', '');?>%<p>
			<p> --------------- </p>
			<p>Current IT Staff: <?php echo $total_IT;?></p>
			<p>Current Teaching Staff: <?php echo $total_teacher;?></p>
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
