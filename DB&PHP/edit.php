<?php
$message = "";
include 'dbcon.php'; 
	$newid = $_GET['id']; //getting id from url;

	$sql2 = "SELECT * FROM emp_record WHERE emp_id = '$newid'";
	$delfire = mysqli_query($conn,$sql2);
	while ($row=mysqli_fetch_array($delfire)) {
	$id = $row['emp_id'];
	$SSN = $row['ssn'];
	$ename = $row['emp_Name'];
	$dept = $row['emp_Dept'];
	$salary = $row['emp_Salary'];
	$Address = $row['emp_Address'];
	$Number = $row['phone'];
	$email = $row['email'];
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
			<div class="col-md-4 sidebar" style="height: 600px;">
				<a href="dashbord.php"><h1>Dashbord</h1></a>
				<ul>
					<li><a href="dashbord.php">View Employees</a></li>
					<li class="active"><a href="insert.php">Add Employee</a></li>
					<li><a href="search_database.php">Search</a></li>
					<li><a href="edituser.php">Setting</a></li>
					<li><a href="../login.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<form action="edit.php?id=<?php echo $id; ?>" method="POST">
		<fieldset>
			<?php echo $message; ?><br>
			<span class="field">Employee Name:</span> <br><input class="form-control  mb-2" type="text" name="ename" value="<?php echo $ename; ?>">
			<span class="field">Social Security Number:</span> <br><input class="form-control  mb-2" type="text" name="ssn" value="<?php echo $SSN; ?>">
			<span class="field">Employee Depertment:</span><br> <input class="form-control mb-2" type="text" name="dept" value="<?php echo $dept; ?>">
			<span class="field">Employee Salary: </span><br><input class="form-control mb-2" type="text" name="salary" value="<?php echo $salary; ?>">
			<span class="field">Employee Home Address: </span><br><textarea class="form-control mb-2" name="Address"><?php echo $Address; ?></textarea>
			<span class="field">Phone Number:</span> <br><input class="form-control mb-2" type="text" name="phone" value="<?php echo $Number ?>">
			<span class="field">Email:</span> <br><input class="form-control mb-2" type="email" name="email" value="<?php echo $email; ?>">
			<button type="submit" name="submit" class="btn btn-success mb-2">Update Record</button>
		</fieldset>
	  </form>
				
			</div>
		</div>
	</div>

	
	<script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php 
include 'dbcon.php';
if (isset($_POST['submit'])) {
	$update_record_id = $_GET['id']; //getting id from url;
	$ename = $_POST['ename'];
	$ssn  = $_POST['ssn'];
	$dept = $_POST['dept'];
	$salary = $_POST['salary'];
	$Address = $_POST['Address'];
	$phone   = $_POST['phone'];
	$email = $_POST['email'];
	
	$update_query = "UPDATE `emp_record` SET `emp_Name`='$ename',`emp_Dept`='$dept',`ssn`='$ssn',`emp_Salary`='$salary',`emp_Address`='$Address',`phone`='$phone',`email`='$email' WHERE emp_id = '$update_record_id'";
$result = mysqli_query($conn,$update_query);
if ($result) {
	header("Location: dashbord.php?Record successfully updated");
}
else {
	header("Location: dashbord.php?Failed to update the record");
}
}

?>