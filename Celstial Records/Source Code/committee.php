<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<h1><b>Committee Info<b></h1>
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
td,h1{
  text-decoration: none;
  color:  #ffffff;
}
body {
            background-image: url("/img/gal3.jpg");
			
			 background-position: center;
			  
           background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   position: relative;
}
</style>
</head>
<body>
<table>
<tr>
<th>Commno</th>
<th>Reportid</th>
<th>Lab id</th>
<th>Headname</th>
<th>No of people</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT commno,reportid,labid,headname,noofpeople FROM committee";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["commno"]. "</td><td>" . $row["reportid"] . "</td><td>"
. $row["labid"]. "</td><td>" . $row["headname"] . "</td><td>" . $row["noofpeople"] .  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>