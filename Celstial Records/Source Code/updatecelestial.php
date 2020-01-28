<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Update Celestial</h1>
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
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>Name</th>
<th>objectid</th>
<th>mass</th>
<th>date</th>
<th>Type</th>
<th>Scientist Id</th>





</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="updatecelestial.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT objectid  FROM celestia"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>Object.ID..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $objectid = $rows['objectid'];
		 
		 echo "<option value ='$objectid'>$objectid</option>";
	 }
	 ?>
	 </select><br><br>
     
	 <label><b>Name</b></label>
					<input  class="form-control" type="text" name="name" required>
	<label><b>Mass</b></label>
					<input   class="form-control"  type="text" name="mass" required>
    <label><b>Date</b></label>
					<input   class="form-control" type="text" name="date" required>
					 <label><b>Type</b></label>
					<input   class="form-control" type="text" name="type" required>
					 <label><b>Scientist.id</b></label>
					<input   class="form-control" type="text" name="scientistid" required>
					
  

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
	 $name = $_POST['name'];
	 $mass = $_POST['mass'];
	  $date = $_POST['date'];
	   $type = $_POST['type'];
	   $scientistid = $_POST['scientistid'];
	
	

	 
    // connect to mysql
   
    
    // mysql search query
    $up = "UPDATE `celestia` SET 
	 
      
     
       `name` = '$name', 
	    `mass` ='$mass', 
		 `date` ='$date', 
		  `type` ='$type', 
	      `scientistid` = '$scientistid'
		   
		  
       
  where `objectid`= '$objectid'";
   $sel="SELECT name, objectid, mass,date,type,scientistid FROM celestia";
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
echo "<tr><td>" . $row["name"] . "</td><td>" . $row["objectid"] . "</td><td>" . $row["mass"] . "</td><td>" . $row["date"] . "</td><td>" . $row["type"] . "</td><td>" . $row["scientistid"] .  "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

