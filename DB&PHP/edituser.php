<?php
$message = "";
include 'dbcon.php'; 

	$sql2 = "SELECT `username`, `user_email`, `password`, `phone_Number` FROM `users`";
	$delfire = mysqli_query($conn,$sql2);

	if($row=mysqli_fetch_array($delfire)){
	$uname = $row['username'];
	$upassword = $row['password'];
	$uNumber = $row['phone_Number'];
	$uemail = $row['user_email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update User Profile</title>
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
					<li><a href="insert.php">Add Employee</a></li>
					<li><a href="search_database.php">Search</a></li>
					<li class="active"><a href="edituser.php">Setting</a></li>
					<li><a href="../login.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<form action="edituser.php" method="POST">
		<fieldset>
			<?php echo $message; ?><br>
			<span class="field">UserName:</span> <br><input class="form-control  mb-2" type="text" name="uname" value="<?php echo $uname; ?>">
			<span class="field">Useremail:</span> <br><input class="form-control  mb-2" type="text" name="uemail" value="<?php echo $uemail; ?>">
			<span class="field">Password:</span><br> <input class="form-control mb-2" type="text" name="upassword" value="<?php echo $upassword; ?>">
			<span class="field">Phone Number: </span><br><input class="form-control mb-2" type="text" name="uNumber" value="<?php echo $uNumber; ?>">
			<button type="submit" name="submit" class="btn btn-success mb-2">Update User</button>
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
	$name = $_POST['uname'];
	$password = $_POST['upassword'];
	$phone   = $_POST['uNumber'];
	$email = $_POST['uemail'];
	
	$update_query = "UPDATE `users` SET `username`='$name',`user_email`='$email',`password`='$password',`phone_Number`='$phone'";
$result = mysqli_query($conn,$update_query);
if ($result) {
	header("Location: dashbord.php?User successfully updated");
}
else {
	header("Location: dashbord.php?Failed to update the User");
}
}

?>