<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<H3>INSERT NEW TUPLES TO TABLE LOCATION :</H3><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>ID</label><input type="text" name="id" id="id"><br/><br/>
<label>Name</label><input type="text" name="name" id="name"><br/><br/>
<label>Address</label><input type="text" name="address" id="address"><br/><br/>
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
$address = mysqli_real_escape_string($conn, $_POST["address"]);


$sql  = "INSERT INTO location (id, name, address) VALUES ('$id', '$name','$address')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record created successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
