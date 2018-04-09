<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE PROJECT :</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>ID</label><input type="text" name="id" id="id"><br/><br/>
<label>Name</label><input type="text" name="name" id="name"><br/><br/>
<label>Location ID</label><input type="text" name="location_id" id="location_id"><br/><br/>
<label>Phase</label><input type="text" name="phase" id="phase"><br/><br/>
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

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$location_id = mysqli_real_escape_string($conn, $_POST["location_id"]);
$phase = mysqli_real_escape_string($conn, $_POST["phase"]);


$sql  = "INSERT INTO project (id, name, location_id, phase) VALUES ('$id', '$name','$location_id', '$phase')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
