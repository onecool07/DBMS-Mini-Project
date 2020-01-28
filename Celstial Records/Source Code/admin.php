
<?php

$database="celestial";
 $link= mysqli_connect("localhost","root","",$database);

if($link)
echo "connected";




if(isset($_POST['Login']))
{
  $email=$_POST['email']; 
$password=$_POST['password'];



$sql="SELECT * FROM admin WHERE email='$email' and password='$password'";
$result=mysqli_query($link,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    
	
				echo "<script>
				alert('Admin login succesfull');
				window.location.href='updatebuttons.html';
				</script>";
		
} 
else 
		{	
				echo "error";
				
				echo "<script>
				alert('Data incorrect you are not the admin');
				window.location.href='index.php';
				</script>";			
}}
?>
<!DOCTYPE html>
<html>
<style>
body {
            background-image: url("/img/gal3.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
h1{
  text-decoration: none;
  color:  #ffffff;
}
</style>
<head>
<br><br>
	<title> Admin Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
	
<body>

<div>
	
	
</div>

<div>

	<form action="" method="post">
	
	
		<div class="container">

			<div class="row">
				<div class="col-sm-4">
					<h1>Admin Login</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					
					
					<input class="btn btn-primary" type="submit" id="Login" name="Login" value="Login">
					 <a href="index.php" class="btn btn-primary" role="logo">Cancel</a> 
				</div>
			</div>
		</div>
	</form>
</div>


</body>
<style>

</style>
</html>
