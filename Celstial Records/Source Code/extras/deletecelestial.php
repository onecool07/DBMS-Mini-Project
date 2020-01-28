<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>celestial</h1>
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
tr:nth-child(even) {background-color: #f2f2f2}

</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>objectid</th>
<th>planetname</th>
<th>mass</th>
<th>date</th>
<th>type</th>

<th>Scientist Id</th>





</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="deletecelestial.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT objectid  FROM celestial"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select name="objectid">

     <?php
	  echo "<option value =''>Select..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $objectid = $rows['objectid'];
		 
		 echo "<option value ='$objectid'>$objectid</option>";
	 }
	 ?>
	 </select>
     
	
  

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
   
  $objectid = $_POST['objectid'];
//	 $planetname = $_POST['planetname'];
//	 $mass = $_POST['mass'];
//	   $scientistid = $_POST['scientistid'];
	
	

	 
    // connect to mysql
   
    
    // mysql search query
    $up = "delete from `celestial` 
	 where `objectid`= '$objectid'";
   $sel="SELECT objectid, planetname, mass,date,type,scientistid FROM celestial";
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
echo "<tr><td>" . $row["objectid"] . "</td><td>" . $row["planetname"] . "</td><td>" . $row["mass"] . "</td><td>" . $row["date"] .  "</td><td>" . $row["type"] .  "</td><td>" . $row["scientistid"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

