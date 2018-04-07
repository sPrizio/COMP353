<html>
<head>
    <meta charset="UTF-8">
    <title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>ID</label><input type="text" name="id" id="id"><br/><br/>
    <label>First Name</label><input type="text" name="first_name" id="first_name"><br/><br/>
    <label>Last Name</label><input type="text" name="last_name" id="last_name"><br/><br/>
    <label>SIN</label><input type="text" name="sin" id="sin"><br/><br/>
    <label>Date of Birth</label><input type="text" name="date_of_birth" id="date_of_birth"><br/><br/>
    <label>Address</label><input type="text" name="address" id="address"><br/><br/>
    <label>Phone</label><input type="text" name="phone" id="phone"><br/><br/>
    <label>Salary</label><input type="text" name="salary" id="salary"><br/><br/>
    <label>Gender</label><input type="text" name="gender" id="gender"><br/><br/>
    <label>Department ID</label><input type="text" name="department_id" id="department_id"><br/><br/>
    <input type="submit" value="Submit">
</form>

</body>
</html>
<?php
$servername = "localhost";
$username = "comp353";
$password = "admin";
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
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$salary = mysqli_real_escape_string($conn, $_POST["salary"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
$department_id = mysqli_real_escape_string($conn, $_POST["department_id"]);

$sql = "INSERT INTO employee (id, first_name, last_name, sin, date_of_birth, address, phone, salary, gender, department_id) VALUES ('$id', '$first_name', '$last_name', '$sin', '$date_of_birth', '$address', '$phone', '$salary', '$gender', '$department_id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: " . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
