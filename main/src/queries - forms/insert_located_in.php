<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE LOCATED_IN :</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Location ID</label><input type="text" name="location_id" id="location_id"><br/><br/>
<label>Department ID</label><input type="text" name="department_id" id="department_id"><br/><br/>
<input type="submit" value="Submit">
</form>

</body>
</html>
<?php
$servername = "localhost";
$username= "root";
$password = "SOEN341W18";
$dbname = "comp353_main_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$location_id = mysqli_real_escape_string($conn, $_POST["location_id"]);
$department_id = mysqli_real_escape_string($conn, $_POST["department_id"]);

$sql  = "INSERT INTO located_in (location_id, department_id) VALUES ('$location_id', '$department_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
