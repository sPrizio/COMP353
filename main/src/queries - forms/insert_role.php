<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE RESPONSIBLE_FOR:</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Employee ID</label><input type="text" name="employee_id" id="employee_id"><br/><br/>
<label>Supervisor ID</label><input type="text" name="supervisor_id" id="supervisor_id"><br/><br/>
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

$employee_id = mysqli_real_escape_string($conn, $_POST["employee_id"]);
$supervisor_id = mysqli_real_escape_string($conn, $_POST["supervisor_id"]);

$sql  = "INSERT INTO role (employee_id, supervisor_id) VALUES ('$employee_id', '$supervisor_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
