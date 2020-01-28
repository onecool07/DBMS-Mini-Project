<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Scientist Info</h1>
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
<th>telid</th>
<th>length</th>
<th>observatory Id</th>
<th>scientistid</th>



</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="inserttelescope.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">
      <label><b>Tel.ID</b></label>
					<input    class="form-control" type="text" name="telid" required>
      <label><b>length</b></label>
					<input  class="form-control" type="text" name="length" required>
	 <label><b>lens</b></label>
					<input  class="form-control" type="text" name="lens" required>
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
    $telid = $_POST['telid'];
     $length = $_POST['length'];
	 $lens = $_POST['lens'];
	 $scientistid = $_POST['scientistid'];
	
	
    // connect to mysql
   
    
    // mysql search query
	
	 $sel="SELECT telid, length, lens,scientistid FROM telescope";
      $insert ="insert into telescope (telid,length,lens,scientistid) values ('$telid','$length','$lens','$scientistid')";
  
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
	   
echo "<tr><td>" . $row["telid"]. "</td><td>" . $row["length"] . "</td><td>"
. $row["lens"]. "</td><td>" . $row["scientistid"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

