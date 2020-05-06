<!DOCTYPE html>
<?php
session_start();
require("backend/mysql/connection.php");
include_once("assert/assert.php");

if(!isset($_SESSION["isStaffLogin"])) {
	header('Location: index.php');
}

$CoursesMgr = $conn->query("SELECT * FROM CoursesMgr");

if(!isset($_SESSION["isStaffLogin"])) {
	header("Location: index.php");
}

if($_GET['courses_time_search'] != null) {
	$cts = $_POST['cts'];
	$sql = "SELECT * FROM ClassMgr WHERE cID='$cts'";
	$Manager = $conn->query($sql);
}
?>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Staff Management Page - Hong Kong Primary School Attendance System</title>

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
          <li class="nav-item active">
            <a class="nav-link" href="staff.php">HKPS
              <span class="sr-only">(current)</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="staff/attends.php">Attends Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff/staff_m.php">Staff Records Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff/student_m.php">Student Management</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff/cac_m.php">C&C Management</a>
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
          <small>Attendance System (AS)</small>
        </h1>

        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="images/hrms.png" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">Announcement</h2>
            <p class="card-text">This is our Attendance System for FYP .All function are well prepared .We felt happy to do that! 
			<br><br>Staff System, I am Coded by Kenny Chak & Anson Tsang. SQL & OS Managed by KC Hung.</p>
          </div>
          <div class="card-footer text-muted">
            Today: <?php echo date("Y-m-d");?> | <?php echo date("h:i"); ?>
          </div>
        </div>
		
	    <div class="card mb-4">
          <div class="card-body">
		  <h2 class="card-title">Time Tables</h2>
		  
		  <form action="?courses_time_search=erfker" method="post">
		<div class="form-row">
	    <div class="form-group col-md-6">
	    <select class="custom-select" id="basic" name="cts">
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
	    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Search Courses Time Table</button>
        </div>
		</div>
		</form>
		  
		<?php
		if ($Manager->num_rows > 0) {
			echo "<table class=\"table\"> <thead class=\"thead-dark\"><tr><th scope=\"col\">#</th><th scope=\"col\">Class ID</th><th scope=\"col\">Lesson Start At</th><th scope=\"col\">Lesson End At</th><th scope=\"col\">Weeks</th></tr></thead><tbody>";
			while($row = $Manager->fetch_assoc()) {
				echo "<tr><th scope=\"row\">".$row["cID"]."</th><th>".$row["classID"]."</th><th>".$row["tTime"]."</th><th>".$row["eTime"]."</th><th>".$row["tWeek"]."</th>.";
			}
			echo "</tbody></table>";
		} else {
		  echo "<table class=\"table\"><thead class=\"thead-dark\"> <tr> <th scope=\"col\">Please Select the Search Box and Click \"Search\"</th></tr></thead><tbody>";
		  echo "<tr><th scope=\"row\">Please Select the Search Box and Click \"Search\"</th>";
		  echo "</tbody></table>";
	  }
	  $conn->close();
	  ?>

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
			<p>Welcome <?php echo $_SESSION["username"]; ?>.<br>
			You belongs to <strong><?php echo $_SESSION["dept"];?></strong><br>
			Your Role is <strong><?php echo $_SESSION['role'];?></strong>
			<br>Current Date Time: <strong><?php echo date("y/m/d") . " | " . date("h:i"); ?></strong><br></p>
            </div>
          </div>
        </div>
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Hello World, And Hello E.</h5>
		  <img src="images/giphy.gif">
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
