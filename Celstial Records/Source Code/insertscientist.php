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
<th>id</th>
<th>name</th>
<th>observatory Id</th>
<th>Qualification</th>
<th>Sex</th>


</tr>
        <title> PHP FIND DATA </title>
    <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        

        

 

  

    <form action="insertscientist.php" method="post">
<div class="container">
  <div class="row">
<div class="col-sm-3">
      <label><b>ID</b></label>
					<input    class="form-control" type="text" name="id" required>
      <label><b>Name</b></label>
					<input  class="form-control" type="text" name="name" required>
	 <label><b>observatoryid</b></label>
					<input  class="form-control" type="text" name="observatoryid" required>
 <label><b>qualification</b></label>
					<input   class="form-control" type="text" name="qualification" required>
 <label><b>sex</b></label>
					<input   class="form-control" type="text" name="sex" required>

					
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
    $id = $_POST['id'];
     $name = $_POST['name'];
	 $observatoryid = $_POST['observatoryid'];
	 $qualification = $_POST['qualification'];
	  $sex = $_POST['sex'];
	
    // connect to mysql
   
    
    // mysql search query
	
	 $sel="SELECT id, name, observatoryid,qualification,sex FROM scientist";
      $insert ="insert into scientist (id,name,observatoryid,qualification,sex) values ('$id','$name','$observatoryid','$qualification','$sex')";
  
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
	   
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["observatoryid"]. "</td><td>" . $row["qualification"] . "</td><td>" . $row["sex"] . "</td></tr>";
}} else {
    echo "0 results";
}
   mysqli_close($connect);

// in the first time inputs are empty

}

?>

