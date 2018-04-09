<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<H3>INSERT NEW TUPLES TO TABLE DEPARTMENT :</H3><br/>
<label>ID</label><input type="text" name="id" id="id"><br/><br/>
<label>Name</label><input type="text" name="name" id="name"><br/><br/>
<label>Manager ID</label><input type="text" name="manager_id" id="manager_id"><br/><br/>
<label>Manager Start Date</label><input type="text" name="manager_start_date" id="manager_start_date"><br/><br/>
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
$manager_id = mysqli_real_escape_string($conn, $_POST["manager_id"]);
$manager_start_date = mysqli_real_escape_string($conn, $_POST["manager_start_date"]);

$sql  = "INSERT INTO department (id, name, manager_id, manager_start_date) VALUES ('$id','$name','$manager_id','$manager_start_date')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
