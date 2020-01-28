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

body {
            background-image: url("/img/gal4.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: no-fixed;
  background-size: cover;
   position: relative;
}
</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>

<th>Observatoryid</th>
<th>Supervisor.Id</th>
<th>Country</th>

<th>City</th>






</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="updateobservatory.php" method="post">
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
	  echo "<option value =''>Select..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $observatoryid = $rows['observatoryid'];
		 
		 echo "<option value ='$observatoryid'>$observatoryid</option>";
	 }
	 ?>
	 </select><br><br>
     
	 <label><b>Supervisor</b></label>
					<input    class="form-control" type="text" name="supervisor" required>
	 <label><b>Observatoryid</b></label>
					<input  class="form-control" type="text" name="observatoryid" required>
   <label><b>Country</b></label>
					<input   class="form-control" type="text" name="country" required>
   <label><b>City</b></label>
					<input  class="form-control" type="text" name="city" required>					
 
        <input type="submit" name="update" value="update">
</div>
</div>
</div>

      </form>

    </body>

</html>

<?php
 $connect = mysqli_connect("localhost", "root","","celestial");
// php code to search data in mysql database and set it in input text

if(isset($_POST['update']))
{
    // id to search
   
 //    $telid = $_POST['telid'];
	 $supervisor = $_POST['supervisor'];
	 $country = $_POST['country'];
	   
	 $city = $_POST['city'];
	
	 
    // connect to mysql
   
    
    // mysql search query
    $up = "update `observatory` SET 
	 
      
       `supervisor` = '$supervisor', 
     
       `country` = '$country', 
	    
	      `city` = '$city'
		  		  
       
  where `observatoryid`= '$observatoryid'";
   $sel="SELECT observatoryid,supervisor, country,city FROM observatory";
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
echo "<tr><td>" . $row["observatoryid"] . "</td><td>" . $row["supervisor"] . "</td><td>" . $row["country"] . "</td><td>" . $row["city"] .  "</td></tr>" ;
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

