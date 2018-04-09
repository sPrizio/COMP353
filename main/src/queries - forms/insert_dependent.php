<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE DEPENDENT :</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>ID</label><input type="text" name="id" id="id"><br/><br/>
<label>First Name</label><input type="text" name="first_name" id="first_name"><br/><br/>
<label>Last Name</label><input type="text" name="last_name" id="last_name"><br/><br/>
<label>SIN</label><input type="text" name="sin" id="sin"><br/><br/>
<label>Date of Birth</label><input type="text" name="date_of_birth" id="date_of_birth"><br/><br/>
<label>Address</label><input type="text" name="address" id="address"><br/><br/>
<label>Gender</label><input type="text" name="gender" id="gender"><br/><br/>
<label>Employee ID</label><input type="text" name="employee_id" id="employee_id"><br/><br/>
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
$first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
$last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
$sin = mysqli_real_escape_string($conn, $_POST["sin"]);
$date_of_birth = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$employee_id = mysqli_real_escape_string($conn, $_POST["employee_id"]);

$sql  = "INSERT INTO dependent (id, first_name, last_name, sin, date_of_birth, gender, employee_id) VALUES ('$id', '$first_name', '$last_name', '$sin', '$date_of_birth','$gender', '$employee_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
