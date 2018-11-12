<?php include 'dbcon.php'; ?>
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
					<li class="active"><a href="dashbord.php">ViewEmployees</a></li>
					<li><a href="insert.php">Add Employee</a></li>
					<li><a href="search_database.php">Search</a></li>
					<li><a href="edituser.php">Setting</a></li>
					<li><a href="../login.php">Logout</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<h1 style="float: left;">All Available Employees</h1>
				<a href="insert.php" style="float: right; margin-top: 9px;"><button class="btn btn-primary">Add New Employee</button></a>
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
$Sno = 0;
while ($row=mysqli_fetch_array($execute)) {
	
	$SSN = $row['ssn'];
	$id = $row['emp_id'];
	$ename = $row['emp_Name'];
	$dept = $row['emp_Dept'];
	$salary = $row['emp_Salary'];
	$Address = $row['emp_Address'];
	$Number = $row['phone'];
	$email = $row['email'];
	$Sno++;

 ?>
 	<tbody>
 		<td><?php echo $Sno; ?></td>
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