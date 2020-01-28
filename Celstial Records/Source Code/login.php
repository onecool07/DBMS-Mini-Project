

<!DOCTYPE html>
<html>

<head>

	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
	
<body>

<div>
	
</div>

<div>
<style>
body {
            background-image: url("/img/gal4.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}

</style>
	<form action="login.php" method="post">
		<div class="container">

			<div class="row">
				<div class="col-sm-4">
				<br><br>
					<h1>Login Here</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-4">
					

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-4">
					
					
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
<?php
$database="celestial";
 $link= mysqli_connect("localhost","root","",$database);

if($link)
echo "connected";




if(isset($_POST['Login']))
{
  $email=$_POST['email']; 
$password=$_POST['password'];


 $query ="insert into login (email,password) values ('$email','$password')";
$sql="SELECT * FROM users WHERE email='$email' and password='$password'";
mysqli_query($link,$query);
$result1=mysqli_query($link,$sql);
// Mysql_num_row is counting table row
$count=mysqli_num_rows($result1);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    
	
				echo "<script>
				alert('Login successfully');
				window.location.href='buttons.html';
				</script>";
		
} 
else 
		{	
				echo "error";
				
				echo "<script>
				alert('Data adding failed Please register yourself');
				window.location.href='index.php';
				</script>";			
}}
?>
