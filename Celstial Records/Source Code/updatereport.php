<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Report</h1>
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

<th>reportno</th>
<th>status</th>
<th>name</th>
<th>objectid</th>
<th>date</th>






</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="updatereport.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT reportno  FROM report"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>ReportNo..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $reportno = $rows['reportno'];
		 
		 echo "<option value ='$reportno'>$reportno</option>";
	 }
	 ?>
	 </select><br><br>
     
	 <label><b>status</b></label>
					<input    class="form-control" type="text" name="status" required>
	 <label><b>name</b></label>
					<input  class="form-control" type="text" name="name" required>
   <label><b>objectid</b></label>
					<input   class="form-control" type="text" name="objectid" required>
   <label><b>date</b></label>
					<input  class="form-control" type="text" name="date" required>					
 
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
	 $status = $_POST['status'];
	 $name = $_POST['name'];
	   $objectid = $_POST['objectid'];
	 $date = $_POST['date'];
	
	 
    // connect to mysql
   
    
    // mysql search query
    $up = "update `report` SET 
	 
      
       `status` = '$status', 
     
       `name` = '$name', 
	    `objectid` ='$objectid', 
	      `date` = '$date'
		  		  
       
  where `reportno`= '$reportno'";
   $sel="SELECT reportno,status, name, objectid,date FROM report";
   $result=mysqli_query($connect,$up);
   
   $result1=mysqli_query($connect,$sel);
    if($result)
   {
       echo 'Data updated';
   }else{
       echo 'Data Not updated';
   }
     if($result1->num_rows > 0)
    {
    // output data of each row
   while($row = $result1->fetch_assoc()) {
echo "<tr><td>" . $row["reportno"] . "</td><td>" . $row["status"] . "</td><td>" . $row["name"] . "</td><td>" . $row["objectid"] .  "</td><td>" . $row["date"] .  "</td></tr>" ;
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

