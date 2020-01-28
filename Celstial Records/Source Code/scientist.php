<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<h1>Scientist Info</h1>
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
background-color: #589c7c;
color: white;
}

</style>
</head>
<body>
<table>
<tr>
<th>Id</th>

<th>Name</th>
<th>ObservatoryId</th>
<th>Qualification</th>
<th>sex</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name,observatoryid,qualification,sex FROM scientist";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["observatoryid"]. "</td><td>" . $row["qualification"] . "</td><td>" . $row["sex"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>