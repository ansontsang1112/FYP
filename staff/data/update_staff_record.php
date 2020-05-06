<!DOCTYPE html>
<?php
session_start();
require('../../backend/mysql/connection.php');
$staffid = $_GET['staff_data'];

$getDataForStaff = $conn->query("SELECT * FROM staff_records WHERE staffid = '$staffid'");
$resultSet = $getDataForStaff->fetch_assoc();

if($_GET['change']!=null) {
	$password; $role; $dept; $course;
	$sid = $_GET['staff_data'];
	
	if($_POST['changePassword'] == "NO") {
		$password = $resultSet['password'];
	} else {
		$password = $_POST['password'];
	}
	
    if($_POST['role'] == "null") {
		$role = $resultSet['role'];
	} else {
		$role = $_POST['role'];
	}
	
	if($_POST['dept'] == "null") {
		$dept = $resultSet['dept'];
	} else {
		$dept = $_POST['dept'];
	}
	
    if($_POST['courses'] == "null") {
		$course = $resultSet['cID'];
	} else {
		$course = $_POST['courses'];
	}
	
	$conn->query("UPDATE staff_records SET password='$password', role='$role', dept='$dept', cID='$course' 
	WHERE staffid = '$sid'");
	header('Location: ../staff_m.php');
}
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Employee Record Update - HyperGroup Human Resources Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="//cdn.hypernology.com/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 

  <!-- Custom styles for this template -->
  <link href="//cdn.hypernology.com/css/hrms.css" rel="stylesheet">
  

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">HNGroup. HRMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="controller.php">HRMS
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="../attends.php">Attends Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="../staff_m.php">Staff Records Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="../student_m.php">Student Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="../cac_m.php">C&C Management</a>
		  </li>
          <li class="nav-item">
            <a class="nav-link" href="../../logout.php">Logout</a>
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

        <h1 class="my-4">HyperGroup. (HNYCo. & HNPo.)<br>
          <small>Human Resources Management System (HRMS)</small>
        </h1>

        <!-- Blog Post -->
        <div class="panel panel-primary">
		<form action="?change=true&staff_data=<?php echo $resultSet['staffid'];?>" method="post">
		<div class="form-row">
		<div class="form-group col-md-6">
        <label for="systemid" align="center">System ID</label>
        <input type="text" name="sysid" class="form-control" value="<?php echo $resultSet['sysid'];?>" disabled>
        </div>
        <div class="form-group col-md-6">
        <label for="sid" align="center">Staff ID</label>
        <input type="text" name="staffid" class="form-control" value="<?php echo $resultSet['staffid'];?>" disabled>
        </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label>Password</label>
    <input type="text" name="password" class="form-control" placeholder="Enter the New Password">
	<p> No Password Changes <input type="checkbox" name="changePassword" value="NO" /></p>
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
        <option value="FT Teacher">FT Teacher</option>
		<option value="PT Teacher">PT Teacher</option>
		<option value="IT Staff">IT Staff</option>
		<option value="Principal">Principal</option>
      </select>
    </div>
	<div class="form-group col-md-6">
      <label for="courses">Courses</label>
      <select id="courses" name="courses" class="form-control">
        <option value="Teaching Department" selected>Teaching Department</option>
		<option value="IT Department">IT Department</option>
		<option value="Executive">Executive</option>
      </select>
    </div>
	  </div>
  <button type="submit" class="btn btn-primary">Submit Staff Reason  : <?php echo $queryResult['engName']; ?></button>
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
                    <a href="../addition.php">eRecord Creation</a>
                  </li>
                  <li>
                    <a href="../termination.php">Termination</a>
                  </li>
                  <li>
                    <a href="../update.php">eModification</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="../../ELS/list.php">List All</a>
                  </li>
                  <li>
                    <a href="../../SAN/lc.php">sModification</a>
                  </li>
                  <li>
                    <a href="../../logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">About the Termination</h5>
          <div class="card-body">
            <p>Current Employee: <?php echo $total_staff_record+2;?></p>
			<p>Dismissed Employee: <?php echo $dismissed_count; ?></p>
			<p>Dismissed Rate : <?php echo number_format((float)($dismissed_count/($total_staff_record+2) * 100), 2, '.', '');?>%<p>
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
