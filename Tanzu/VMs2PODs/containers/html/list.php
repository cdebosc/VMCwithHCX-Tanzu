<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="refresh" content="5">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
</head>
<body>
php-fpm on: <p style="font:italic small-caps bold 18px/24px Garamond, Georgia, Times, Serif;color:green;">
<?php

echo gethostname();
?>	
</p><br>

<?php
$hostname = getenv("MARIADB_HOST");
$username = getenv("MARIADB_USER");
$password = getenv("MARIADB_PASSWORD");
$db = getenv("MARIADB_DATABASE");
echo "<p>BD -=> ".$username."@".$hostname.":".$db."</p>";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

$result = $dbconnect->query("select * from web");

echo "<table style=\"width:100%\"><tr><th>Name</th><th>Description</th></tr>";

if ($result->num_rows > 0) {
    // Read the records
    while($row = $result->fetch_assoc()) {
	echo "<tr><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";
    }
}
else
    echo "No record found";

echo "</table>";

$dbconnect->close();

?>

</body>
</html>
