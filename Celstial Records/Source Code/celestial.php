<!DOCTYPE html>
<html>
<head>
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
            background-image: url("/img/gal6.jpg");
			
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
<th>Object Id</th>
<th>Mass</th>
<th>Date of discovery</th>
<th>Type</th>
<th>Scientist Id</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,objectid,mass,date,type,scientistid FROM celestia";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["objectid"] . "</td><td>"
. $row["mass"]. "</td><td>" . $row["date"] . "</td><td>" . $row["type"] . "</td><td>" . $row["scientistid"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>