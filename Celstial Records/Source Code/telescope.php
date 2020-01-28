<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<h1>Telescopes</h1>
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
<th>Tel.Id</th>

<th>Length</th>
<th>Lens</th>
<th>Scientist.Id</th>


</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "celestial");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT telid,length,lens,scientistid FROM telescope";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["telid"]. "</td><td>" . $row["length"] . "</td><td>"
. $row["lens"]. "</td><td>" . $row["scientistid"] .  "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>