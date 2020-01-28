<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Telescope</h1>
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
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>Telid</th>
<th>Length</th>
<th>Lens</th>
<th>Scientist Id</th>





</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="deletetelescope.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT telid  FROM telescope"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>Select..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $telid = $rows['telid'];
		 
		 echo "<option value ='$telid'>$telid</option>";
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
   
//  $telid = $_POST['telid'];
//	 $length = $_POST['length'];
//	 $lens = $_POST['lens'];
//	   $scientistid = $_POST['scientistid'];
	
	

	 
    // connect to mysql
   
    
    // mysql search query
    $up = "delete from `telescope` where `telid`= '$telid'";
   $sel="SELECT telid, length, lens,scientistid FROM telescope";
   $result=mysqli_query($connect,$up);
   
   $result1=mysqli_query($connect,$sel);
    if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
     if($result1->num_rows > 0)
    {
    // output data of each row
   while($row = $result1->fetch_assoc()) {
echo "<tr><td>" . $row["telid"] . "</td><td>" . $row["length"] . "</td><td>" . $row["lens"] . "</td><td>" . $row["scientistid"] .  "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

