<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Celestial Info</h1>
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
tr:nth-child(even) {background-color: #f2f2f2}

</style>
   </head>
     <body>
	 
	 
	 
	 
	 <table>
<tr>
<th>Planet name</th>
<th>Objectid</th>
<th>Mass</th>
<th>Date</th>
<th>Type</th>
<th>Scientistid</th>

</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="insertcelestial.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">
      <label><b>Planet  Name</b></label>
					<input    class="form-control" type="text" name="planetname" required>
      <label><b>objectid</b></label>
					<input  class="form-control" type="text" name="objectid" required>
	 <label><b>mass</b></label>
					<input  class="form-control" type="text" name="mass" required>
 <label><b>date</b></label>
					<input   class="form-control" type="text" name="date" required>
 <label><b>type</b></label>
					<input  class="form-control" type="text" name="type" required>					
 <label><b>scientistid</b></label>
					<input   class="form-control" type="text" name="scientistid" required>
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
    $planetname = $_POST['planetname'];
     $objectid = $_POST['objectid'];
	 $mass = $_POST['mass'];
	 $date = $_POST['date'];
	 $type = $_POST['type'];
	 $scientistid = $_POST['scientistid'];
	 
    // connect to mysql
   
    
    // mysql search query
      $insert ="insert into celestial (planetname,objectid,mass,date,type,scientistid) values ('$planetname','$objectid','$mass','$date','$type','$scientistid')";
   $sel="SELECT planetname, objectid, mass,date,type,scientistid FROM celestial";


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
	   
echo "<tr><td>" . $row["planetname"]. "</td><td>" . $row["objectid"] . "</td><td>"
. $row["mass"]. "</td><td>" . $row["date"] . "</td><td>" . $row["type"] . "</td><td>" . $row["scientistid"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

