<!DOCTYPE html>

<html>

    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Table with database</title>
<h1>Celestial Info</h1>
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
background-color: grey;
color: white;
}

body {
            background-image: url("/img/univ2.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
b,h1,td{
  text-decoration: none;
  color:  #ffffff;
}
</style>
   </head>
     <body>
	 <table>
<tr>
<th>Name</th>
<th>Objectid</th>
<th>Mass</th>
<th>Date</th>
<th>Type</th>
<th>Scientistid</th>

</tr>
        <title> PHP FIND DATA </title>

        

        

 

  

    <form action="search.php" method="post">
<div class="container">
<div class="col-sm-3">
      <label for="planet"><b>Name</b></label>
					<input class="form-control" id="name"  type="text" name="name" required>
     <br>

        <input type="submit" name="search" value="search">
</div>
</div>

      </form>

    </body>

</html>

<?php
 $connect = mysqli_connect("localhost", "root","","celestial");
// php code to search data in mysql database and set it in input text

if(isset($_POST['search']))
{
    // id to search
    $name = $_POST['name'];
    
    // connect to mysql
   
    
    // mysql search query
    $query = "SELECT name, objectid, mass,date,type,scientistid FROM celestia WHERE name = '$name' LIMIT 1";
    
    $result =  $connect->query($query);
    
    // if id exist 
    // show data in inputs
   if($result->num_rows > 0)
    {
    // output data of each row
   while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["objectid"] . "</td><td>"
. $row["mass"]. "</td><td>" . $row["date"] . "</td><td>" . $row["type"] . "</td><td>" . $row["scientistid"] . "</td></tr>";
}} else {
    echo "<b>No results for this name</b>";
}



    
    
  
    mysqli_close($connect);
    

}
// in the first time inputs are empty



?>

