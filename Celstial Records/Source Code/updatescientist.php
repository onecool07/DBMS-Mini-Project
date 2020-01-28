<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Scientist</h1>
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

<th>Id</th>
<th>Name</th>
<th>Observatoryid</th>
<th>qualification</th>
<th>sex</th>

<style>
body {
            background-image: url("/img/gal4.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: no-fixed;
  background-size: cover;
   position: relative;
}
</style>




</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="updatescientist.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">


<?php
 $connect = mysqli_connect("localhost", "root","","celestial");

 $sel1="SELECT id  FROM scientist"; 
  $result3=mysqli_query($connect,$sel1);
 ?>
<select>

     <?php
	  echo "<option value =''>Id..</option>";
	 while($rows =$result3->fetch_assoc())
	 {
		 $id = $rows['id'];
		 
		 echo "<option value ='$id'>$id</option>";
	 }
	 ?>
	 </select><br><br>
     
	 <label><b>Name</b></label>
					<input    class="form-control" type="text" name="name" required>
	 <label><b>Observatoryid</b></label>
					<input  class="form-control" type="text" name="observatoryid" required>
   <label><b>Qualification</b></label>
					<input   class="form-control" type="text" name="qualification" required>
   <label><b>Sex</b></label>
					<input  class="form-control" type="text" name="sex" required>					
 
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
	 $observatoryid = $_POST['observatoryid'];
	   $qualification = $_POST['qualification'];
	 $sex = $_POST['sex'];
	
	 
    // connect to mysql
   
    
    // mysql search query
    $up = "update `scientist` SET 
	 
      
       `name` = '$name', 
     
       `observatoryid` = '$observatoryid', 
	    `qualification` ='$qualification', 
	      `sex` = '$sex'
		  		  
       
  where `id`= '$id'";
   $sel="SELECT id,name, observatoryid, qualification,sex FROM scientist";
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
echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["observatoryid"] . "</td><td>" . $row["qualification"] .  "</td><td>" . $row["sex"] .  "</td></tr>" ;
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

