<?php
$logerror = "";
include 'DB&PHP/dbcon.php';

    if(isset($_POST['submit'])){
        $username = $_POST['uname'];
        $password = $_POST['password']; 

        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            header("Location: DB&PHP/dashbord.php");
        }
        else {
            $logerror = "Wrong username or password";
        }

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login system</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="Icon" href="../images/mine.png">

    <style>
        form {
            margin: auto;
            margin-top: 20px;
        }
        body {
            background-color: #d4c;
        }
        .form-control {
            width: 450px;
        }
        button {
            width: 300px;
            margin-left: 15%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div></div>
        <p><h2 class="text-center">Admin</h2></p>
        <div class="row">
            <form method="POST">
                <?php echo $logerror; ?>
            <input class="form-control btn-lg mb-4" type="text" name="uname" placeholder="Enter Username">
            <input class="form-control btn-lg mb-4" type="password" name="password" placeholder="Enter Password">
            <button class="btn btn-success btn-lg" type="submit" name="submit">Login</button>
            <a href="index.php" class="btn btn-primary btn-lg" style="margin-left: 3px;">Back</a>
            </form>
        </div>
    </div>



<script src="jquery/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>