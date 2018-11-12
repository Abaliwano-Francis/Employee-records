<?php
$message = "";
include 'dbcon.php'; 
if (isset($_POST['submit'])) {
	$name = $_POST['ename'];
	$ssn  = $_POST['ssn'];
	$dept = $_POST['dept'];
	$salary = $_POST['salary'];
	$homeaddress = $_POST['homeaddress'];
	$Number   = $_POST['phone'];
	$email = $_POST['email'];

	$sql = "INSERT INTO `emp_record`(`emp_Name`, `emp_Dept`, `ssn`, `emp_Salary`, `emp_Address`, `phone`, `email`) VALUES ('$name','$dept','$ssn','$salary','$homeaddress','$Number','$email')"; 
		
	$result = mysqli_query($conn,$sql);
	if (!$result) {
		$message = "Failed to add the record";
	}else{
		$message = "You have successfully registered";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert into the database</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="Icon" href="../images/mine.png">
	<link rel="stylesheet" href="dashbord.css">
	<link rel="stylesheet" href="../style.css">
	<style>
		.field {
			color: purple;
		}
	</style>
</head>
<body>
	 <div class="menu">
        <nav>
            <div class="logo">
                <img src="../images/mine.png" width="40px;" height="40px;">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="../login.php">Services</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div style="height: 10px; background: #27aae1"></div>
    <!--  Ending of the navigation menu -->
	<div class="container">
		<div class="row">
			<div class="col-md-3 sidebar" style="height: 600px;">
				<a href="dashbord.php"><h1>Dashbord</h1></a>
				<ul>
					<li><a href="dashbord.php">View Employees</a></li>
					<li class="active"><a href="insert.php">Add Employee</a></li>
					<li><a href="search_database.php">Search</a></li>
					<li><a href="edituser.php">Setting</a></li>
					<li><a href="../login.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<form action="insert.php" method="POST">
		<fieldset>
			<?php echo $message; ?><br>
			<span class="field">Employee Name:</span> <br><input class="form-control  mb-2" type="text" name="ename" placeholder="Enter Name" required>
			<span class="field">Social Security Number:</span> <br><input class="form-control  mb-2" type="text" name="ssn" placeholder="Enter ssn" required>
			<span class="field">Employee Depertment:</span><br> <input class="form-control mb-2" type="text" name="dept" placeholder="Enter Department" required>
			<span class="field">Employee Salary: </span><br><input class="form-control mb-2" type="text" name="salary" placeholder="Enter Salary" required>
			<span class="field">Employee Home Address: </span><br><textarea class="form-control mb-2" name="homeaddress" required></textarea>
			<span class="field">Phone Number:</span> <br><input class="form-control mb-2" type="text" name="phone" placeholder="Enter Phone Number">
			<span class="field">Email:</span> <br><input class="form-control mb-2" type="email" name="email" placeholder="example@gmail.com" required>
			<button type="submit" name="submit" class="btn btn-primary mb-2">Add Employee</button>
		</fieldset>
	</form>

				
			</div>
		</div>
	</div>

	
	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>