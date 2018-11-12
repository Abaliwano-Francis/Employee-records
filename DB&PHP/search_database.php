<?php 
include 'dbcon.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashbord</title>
	<link rel="stylesheet" href="../style.css">
    <link rel="Icon" href="../images/mine.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="dashbord.css">
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
			<div class="col-md-3 sidebar" style="height: 700px; background: saddlebrown;">
				<a href="dashbord.php"><h1>Dashbord</h1></a>
				<ul>
					<li><a href="dashbord.php">View Employees</a></li>
					<li><a href="insert.php">Add Employee</a></li>
					<li class="active"><a href="search_database.php">Search</a></li>
					<li><a href="edituser.php">Setting</a></li>
					<li><a href="../login.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div>
					<form action="search_database.php" method="GET">
						<input class="form-control mb-2" style="width: 400px; background: #333; color: white; float: left; margin-top: 10px;" type="text" name="search" placeholder="Enter Name or ssn to search">
						<button class="btn btn-primary mb-2" name="submit" type="submit" style="float: right; margin-top: 10px; width: 150px; margin-right: 130px;">Search</button>
					</form>
				</div>
				<!-- End of search button -->
<?php
		if (isset($_GET['search'])) {
	$search = $_GET['search'];

	$searchquery = "SELECT * FROM emp_record WHERE emp_Name='$search' OR ssn='$search'";
	$result = mysqli_query($conn,$searchquery);
	?>
	<table class="table table-striped table-bordered">
		<caption>Search results</caption>
		<tr>
			<th>ID</th>
			<th>Emp Name</th>
			<th>Emp SSN</th>
			<th>Emp Salary</th>
			<th>Department</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email Address</th>
			<th>New</th>
		</tr>
<?php 
	while ($row=mysqli_fetch_array($result)) {
		$id      = $row['emp_id'];
		$name    = $row['emp_Name'];
		$ssn     = $row['ssn'];
		$dept    = $row['emp_Dept'];
		$salary  = $row['emp_Salary'];
		$Address = $row['emp_Address'];
		$Number = $row['phone'];
		$email = $row['email'];

		?>
		

		<tbody>
		<tr>
 		<td><?php echo $id; ?></td>
 		<td><?php echo $name; ?></td>
 		<td><?php echo $ssn; ?></td>
 		<td><?php echo $salary; ?></td>
 		<td><?php echo $dept; ?></td>
 		<td><?php echo $Address; ?></td>
 		<td><?php echo $Number; ?></td>
 		<td><?php echo $email; ?></td>
 		<td><a href="search_database.php">Search again</a></td>
 		</tr>
 		<tbody>
<?php 
	}
}
 ?>
 <!-- end of search query -->
				<table class="table table-striped table-bordered">
		<tr>
			<th>ID</th>
			<th>Employee Name</th>
			<th>Employee SSN</th>
			<th>Employee Salary</th>
			<th>Department</th>
			<th>Home Address</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th></th>
			<th></th>
		</tr>
<?php 
$query = "SELECT * FROM emp_record";
$execute = mysqli_query($conn,$query);
while ($row=mysqli_fetch_array($execute)) {
	$id = $row['emp_id'];
	$SSN = $row['ssn'];
	$ename = $row['emp_Name'];
	$dept = $row['emp_Dept'];
	$salary = $row['emp_Salary'];
	$Address = $row['emp_Address'];
	$Number = $row['phone'];
	$email = $row['email'];

 ?>
 	<tbody>
 		<td><?php echo $id; ?></td>
 		<td><?php echo $ename; ?></td>
 		<td><?php echo $SSN; ?></td>
 		<td><?php echo $salary; ?></td>
 		<td><?php echo $dept; ?></td>
 		<td><?php echo $Address; ?></td>
 		<td><?php echo $Number; ?></td>
 		<td><?php echo $email; ?></td>
 		<td><a class="btn btn-danger" href="del.php?id=<?php echo $id; ?>">Delete</a></td>
 		<td><a class="btn btn-primary" href="edit.php?id=<?php echo $id; ?>">Edit</a></td>
 	</tbody>
 <?php } ?>
	</table>
	<!-- End of the table -->
			</div>
		</div>
	</div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>