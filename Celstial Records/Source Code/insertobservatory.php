<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Observatory Info</h1>
<h2>Inserting Values</h2>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #589c7e;
color: white;
}


</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>observatoryid</th>
<th>Supervisor.Id</th>
<th>Country</th>
<th>City</th>



</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="insertobservatory.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">
      <label><b>Observatory Id</b></label>
					<input    class="form-control" type="text" name="observatoryid" required>
      <label><b>Supervisor.Id</b></label>
					<input  class="form-control" type="text" name="supervisor" required>
	 <label><b>Country</b></label>
					<input  class="form-control" type="text" name="country" required>
 <label><b>City</b></label>
					<input   class="form-control" type="text" name="city" required>

					
        <input type="submit" name="Insert" value="Insert">
</div>
</div>
</div>
      </form>

    </body>

</html>

<?php
 $connect = mysqli_connect("localhost", "root","","celestial");
// php code to search data in mysql database and set it in input text

if(isset($_POST['Insert']))
{
    // id to search
    $observatoryid = $_POST['observatoryid'];
     $supervisor = $_POST['supervisor'];
	 $country = $_POST['country'];
	 $city = $_POST['city'];
	
    // connect to mysql
   
    
    // mysql search query
	
	 $sel="SELECT observatoryid, supervisor, country,city FROM observatory";
      $insert ="insert into observatory (observatoryid,supervisor,country,city) values ('$observatoryid','$supervisor','$country','$city')";
  
    $result2=mysqli_query($connect,$insert);
   $result1=mysqli_query($connect,$sel);
   
    if($result2)
   {
       echo 'Data Inserted';
   }else{
       echo 'Data Not Inserted';
   }
     if($result1->num_rows > 0)
    {
    // output data of each row

   while($row = $result1->fetch_assoc()) {
	   
echo "<tr><td>" . $row["observatoryid"]. "</td><td>" . $row["supervisor"] . "</td><td>"
. $row["country"]. "</td><td>" . $row["city"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

