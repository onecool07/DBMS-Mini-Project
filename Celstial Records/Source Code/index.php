
<?php
$database="celestial";
 $link= mysqli_connect("localhost","root","",$database);

if($link)
{}




if(isset($_POST['signup']))
{
  $firstname=$_POST['firstname'];  
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
  $password=$_POST['password'];
   
   $query ="insert into users (firstname,lastname,email,phonenumber,password) values ('$firstname','$lastname','$email','$phonenumber','$password')";
    mysqli_query($link,$query);


}

?>
<!DOCTYPE html>
<html>

<style>

 body {
            background-image: url("/img/univ3.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
h1,p,b{
  text-decoration: none;
  color:  #ffffff;
}

</style>
<head>

	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
	
<body>



<div>

	<form action="index.php" method="post" >

  


		<div class="container">

			<div class="row">
				<div class="col-sm-3">
				<br>
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3" >
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" id="firstname" type="text" name="firstname"  required>

					<label for="lastname"><b>Last  Name</b></label>
					<input class="form-control" id="lastname"  type="text" name="lastname" required>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="signup" name="signup" value="signup">
					
					
				</div>
			</div>
		</div>
	</form>
	</div>
	<div>
	<label><b>Already have an Account? Login Here</b></label>
					  <a href="login.php" class="btn btn-info" >Login</a> 
					   <a href="admin.php" class="btn btn-info" >Login As Admin</a>
					  
	
</div>
</div>




</body>
<style>

</style>
</html>
