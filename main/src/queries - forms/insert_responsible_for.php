<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE RESPONSIBLE_FOR:</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Project ID</label><input type="text" name="project_id" id="project_id"><br/><br/>
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

$project_id = mysqli_real_escape_string($conn, $_POST["project_id"]);
$department_id = mysqli_real_escape_string($conn, $_POST["department_id"]);

$sql  = "INSERT INTO responsible_for (project_id, department_id) VALUES ('$project_id', '$department_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
