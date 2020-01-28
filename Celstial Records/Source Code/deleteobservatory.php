<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Observatory</h1>
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
b,h1,td{
  text-decoration: none;
  color:  #ffffff;
}

</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>Observatoryid</th>
<th>Supervisor</th>
<th>Country</th>
<th>City</th>








</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="deleteobservatory.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT observatoryid  FROM observatory"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>Observatory.Id..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $observatoryid = $rows['observatoryid'];
		 
		 echo "<option value ='$observatoryid'>$observatoryid</option>";
	 }
	 ?>
	 </select><br><br>
     
	
  

        <input type="submit" name="Delete" value="Delete">
</div>
</div>
</div>

      </form>

    </body>

</html>

<?php
 $connect = mysqli_connect("localhost", "root","","celestial");
// php code to search data in mysql database and set it in input text

if(isset($_POST['Delete']))
{
    // id to search
   
//  $observatoryid = $_POST['observatoryid'];
//	 $supervisor = $_POST['supervisor'];
//	 $country = $_POST['country'];
//	   $scientistid = $_POST['scientistid'];
	
	

	 
    // connect to mysql
   
    
    // mysql search query
    $up = "delete from `observatory` 
	 where `observatoryid`= '$observatoryid'";
   $sel="SELECT observatoryid, supervisor, country,city FROM observatory";
   $result=mysqli_query($connect,$up);
   
   $result1=mysqli_query($connect,$sel);
    if($result)
   {
       echo 'Data update';
   }else{
       echo 'Data Not update';
   }
     if($result1->num_rows > 0)
    {
    // output data of each row
   while($row = $result1->fetch_assoc()) {
echo "<tr><td>" . $row["observatoryid"] . "</td><td>" . $row["supervisor"] . "</td><td>" . $row["country"] . "</td><td>" . $row["city"] .  "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

