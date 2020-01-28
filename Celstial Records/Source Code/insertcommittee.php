<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Comm Info</h1>
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
<th>commno</th>
<th>reportid</th>
<th>labid</th>
<th>headname</th>
<th>noofpeople</th>


</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="insertcommittee.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">
      <label><b>Comm no</b></label>
					<input    class="form-control" type="text" name="commno" required>
      <label><b>Report id</b></label>
					<input  class="form-control" type="text" name="reportid" required>
	 <label><b>Lab id</b></label>
					<input  class="form-control" type="text" name="labid" required>
 <label><b>Head name</b></label>
					<input   class="form-control" type="text" name="headname" required>
 <label><b>No of people</b></label>
					<input  class="form-control" type="text" name="noofpeople" required>					

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
    $commno = $_POST['commno'];
     $reportid = $_POST['reportid'];
	 $labid = $_POST['labid'];
	 $headname = $_POST['headname'];
	 $noofpeople = $_POST['noofpeople'];
	
	 
    // connect to mysql
   
    
    // mysql search query
	$sel="SELECT commno, reportid, labid,headname,noofpeople FROM committee";
      $insert ="insert into committee (commno,reportid,labid,headname,noofpeople) values ('$commno','$reportid','$labid','$headname',$noofpeople)";
   
    

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
	   
echo "<tr><td>" . $row["commno"]. "</td><td>" . $row["reportid"] . "</td><td>"
. $row["labid"]. "</td><td>" . $row["headname"] . "</td><td>" . $row["noofpeople"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

