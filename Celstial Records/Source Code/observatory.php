<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<h1><b>Observatory<b></h1>
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
<th>observatory id</th>
<th>SuperVisor.Id</th>
<th>Country</th>
<th>City</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT observatoryid,supervisor,country,city FROM observatory";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["observatoryid"]. "</td><td>" . $row["supervisor"] . "</td><td>"
. $row["country"]. "</td><td>" . $row["city"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>