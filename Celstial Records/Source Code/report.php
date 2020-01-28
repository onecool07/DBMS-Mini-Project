<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<h1>Reports</h1>
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
<th>Report No</th>
<th>Status</th>
<th>Name</th>
<th>Objectid</th>
<th>Date</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT reportno,status,name,objectid,date FROM report";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["reportno"]. "</td><td>" . $row["status"] . "</td><td>"
. $row["name"]. "</td><td>" . $row["objectid"] . "</td><td>" . $row["date"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>