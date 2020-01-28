<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Committee</h1>
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
	 
	 <style>
	 
	 
	 body {
            background-image: url("/img/gal3.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
b,h1{
  text-decoration: none;
  color:  #ffffff;
}
	 </style>
	 
	 
	 <table>
<tr>

<th>Commno</th>
<th>Reportid</th>
<th>Labid</th>
<th>Headname</th>
<th>Noofpeople</th>






</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="updatecommittee.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT commno  FROM committee"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>Commno..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $commno = $rows['commno'];
		 
		 echo "<option value ='$commno'>$commno</option>";
	 }
	 ?>
	 </select><br><br>
     
	 <label><b>Reportid</b></label>
					<input    class="form-control" type="text" name="reportid" required>
	 <label><b>Labid</b></label>
					<input  class="form-control" type="text" name="labid" required>
   <label><b>Headname</b></label>
					<input   class="form-control" type="text" name="headname" required>
   <label><b>Noofpeople</b></label>
					<input  class="form-control" type="text" name="noofpeople" required>					
 
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
	 $reportid = $_POST['reportid'];
	 $labid = $_POST['labid'];
	   $headname = $_POST['headname'];
	 $noofpeople = $_POST['noofpeople'];
	
	 
    // connect to mysql
   
    
    // mysql search query
    $up = "update `committee` SET 
	 
      
       `reportid` = '$reportid', 
     
       `labid` = '$labid', 
	    `headname` ='$headname', 
	      `noofpeople` = '$noofpeople'
		  		  
       
  where `commno`= '$commno'";
   $sel="SELECT commno,reportid, labid, headname,noofpeople FROM committee";
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
echo "<tr><td>" . $row["commno"] . "</td><td>" . $row["reportid"] . "</td><td>" . $row["labid"] . "</td><td>" . $row["headname"] .  "</td><td>" . $row["noofpeople"] .  "</td></tr>" ;
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

