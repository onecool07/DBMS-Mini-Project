<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>committee</h1>
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
<th>Commno</th>
<th>Report.Id</th>
<th>Lab.Id</th>
<th>headname</th>
<th>No.Of.people</th>







</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="deletecommittee.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT commno  FROM committee"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select name="commno">

     <?php
	  echo "<option value =''>Committe.No..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $commno = $rows['commno'];
		 
		 echo "<option value ='$commno'>$commno</option>";
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
   
 // $commno = $_POST['commno'];
//	 $reportid = $_POST['reportid'];
//	 $labid = $_POST['labid'];
//	   $scientistid = $_POST['scientistid'];
	
	

	 
    // connect to mysql
   
    
    // mysql search query
    $up = "delete from `committee` 
	 where `commno`= '$commno'";
   $sel="SELECT commno, reportid, labid,headname,noofpeople FROM committee";
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
echo "<tr><td>" . $row["commno"] . "</td><td>" . $row["reportid"] . "</td><td>" . $row["labid"] . "</td><td>" . $row["headname"] .  "</td><td>" . $row["noofpeople"] .  "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

