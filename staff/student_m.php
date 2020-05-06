<!DOCTYPE html>
<?php
session_start();
include_once('../backend/mysql/connection.php');
include_once('../assert/assert.php');

if(!isset($_SESSION["isStaffLogin"])) {
	header('Location: ../index.php');
}

$CoursesMgr = $conn->query("SELECT * FROM CoursesMgr");
$ClassMgr = $conn->query("SELECT * FROM ClassMgr");
$sr_mgr = $conn->query("SELECT studentName FROM student_records");
$sr_mgr2 = $conn->query("SELECT studentid FROM student_records");
$sr_mgr3 = $conn->query("SELECT * FROM student_records");
$CoursesMgr2 = $conn->query("SELECT * FROM CoursesMgr");
$CoursesMgr3 = $conn->query("SELECT * FROM CoursesMgr");

$sysid = uniqid();

$getStaffData = $conn->query("SELECT staffid FROM student_records");

if($_GET['changepassword'] != null) {
	$st_id = $_POST['student_name'];
	$password = $_POST['newPW'];
	
	$sql = "UPDATE student_records SET password='$password' WHERE studentName='$st_id'";
	$conn->query($sql);
}

if($_GET['drop_out'] != null) {
	$st_name = $_POST['student_id'];
	$sql = "DELETE FROM student_records WHERE studentid='$st_name'; ";
	$sql.= "DELETE FROM student_courses_info WHERE studentid='$st_name'";
	$conn->multi_query($sql);
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
		  <li class="nav-item">
            <a class="nav-link" href="attends.php">Attends Management</a>
			<span class="sr-only">(current)</span>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="staff_m.php">Staff Records Management</a>
		  </li>
		  <li class="nav-item active">
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
          <small>Attendance System (AS)</small>
        </h1>

        <!-- Blog Post -->
		<div class="panel panel-primary">
		<p><strong>Addition of A New Student</strong></p>
		</div>
        <div class="panel panel-primary">
		<form action="../backend/dataManagement/add_new_student.php?systemid=<?php echo $sysid;?>" method="post">
		<div class="form-row">
		<div class="form-group col-md-4">
        <label for="systemid" align="center">System ID</label>
        <input type="text" name="sysid" class="form-control" value="<?php echo $sysid;?>" disabled>
        </div>
        <div class="form-group col-md-4">
        <label for="sid" align="center">Student ID</label>
        <input type="text" name="studentid" class="form-control" placeholder="Enter the Student ID">
        </div>
		<div class="form-group col-md-4">
        <label for="sid" align="center">Student Name</label>
        <input type="text" name="studentname" class="form-control" placeholder="Enter the Student Name">
        </div>
  </div>
 <div class="form-row">
        <div class="form-group col-md-6">
        <label>Password</label>
        <input type="text" name="password" class="form-control" placeholder="Enter the Staff Password">
        </div>
	    <div class="form-group col-md-6">
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
  <button type="submit" class="btn btn-primary">Add a New Student Records : <?php echo $sysid; ?></button>
</form>
</div>

<br>
		<div class="panel panel-primary">
		<label><strong>Change Students Password</strong></label>
		<form action="?changepassword=true" method="post">
        <div class="form-row">
	    <div class="form-group col-md-6">
		<label for="cID" align="center">Student Name (Target)</label>
	    <select class="custom-select" id="basic" name="student_name">
        <?php
        if($sr_mgr->num_rows > 0) {
			while($row = $sr_mgr->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["studentName"]."\">".$row["studentName"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
		</div>
        <div class="form-group col-md-6">
        <label align="center">New Password</label>
        <input type="text" class="form-control" id="newPW" name="newPW" placeholder="Insert The New Password">
        </div>
        <div>
		<?php
		if($_SESSION['dept'] == "IT Department" || $_SESSION['dept'] == "Executive") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Change Password For The Student (Target)</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied (Only IT & Executive Can Executive)</button>";
		}
		
		?>
		</div>
        </div>
        </form>
        </div>	
		<br>
				
		<div class="panel panel-primary">
		<form  name="VWLR" action="?drop_out=true" method="post">
		<label><strong>Student Drop Out</strong></label>
		<div class="form-row">
	    <div class="form-group col-md-12">
	    <select class="custom-select" id="basic" name="student_id">
        <?php
        if($sr_mgr2->num_rows > 0) {
			while($row = $sr_mgr2->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["studentid"]."\">".$row["studentid"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
        </div>
		<div>
		<?php
		if($_SESSION['dept'] == "Executive") {
			echo "<button type=\"submit\" class=\"btn btn-primary\">Process to Drop Out HKPS</button>";
		} else {
			echo "<button type=\"reset\" class=\"btn btn-danger\">Permission Denied (Only Principal Can Drop Out Student)</button>";
		}
		
		?>
		</div>
		</div>
		</form>
		<p></p>
        </div>
		
		<div class="panel panel-primary">
		<label><strong>Assign A Cources to a Student</strong></label>
		<form  name="VWLR" action="../backend/dataManagement/update_student_courses.php" method="post">
		<label>Student Name</label>
		<div class="form-row">
	    <div class="form-group col-md-6">
	    <select class="custom-select" id="basic" name="student_name">
        <?php
        if($sr_mgr3->num_rows > 0) {
			while($row = $sr_mgr3->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["studentName"]."\">".$row["studentName"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
        </div>
	    <div class="form-group col-md-6">
	    <select class="custom-select" id="basic" name="courses_id">
        <?php
        if($CoursesMgr3->num_rows > 0) {
			while($row = $CoursesMgr3->fetch_assoc()) {
				echo "<option id=\"basic\" value=\"".$row["cID"]."\">".$row["cID"]."</option>";
			}
		}	
		$conn->close();
	    ?>
	    </select>
        </div>
		<div>
		<button type="submit" class="btn btn-info">Add Courses to Student</button>
		</div>
		</div>
		</form>
		<p></p>
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
