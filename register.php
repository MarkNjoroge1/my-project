<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body class="container">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="#" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="username" class="form-control" required>
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" pattern=".{8,}" title="Eight or more characters">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>

<?php
$connect=mysqli_connect('127.0.0.1','root','','mark_project');

if(mysqli_connect_errno($connect)) //check connection
{
		echo 'Failed to connect';
}
else{
      // create a variable
      $username=$_POST['username'];
      $password=$_POST['password'];
      $confirm=$_POST['confirm_password'];

    if($password == $confirm){
        mysqli_query($connect,"INSERT INTO users (username,password)
        VALUES ('$username','$password')");
        
        if(mysqli_affected_rows($connect) > 0){
          echo "<p>Registered successfully</p>";
          echo '<a href="index.php">Go Back</a>';
      } else {
          echo "An error occured<br />";
          echo mysqli_error ($connect);
      }
    }
    else{
        echo "Password mismatch";
    }

     
}

?>