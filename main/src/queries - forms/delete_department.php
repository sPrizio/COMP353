<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<H3>DELETE TUPLES IN TABLE DEPARTMENT :</H3><br/>
<label>ID</label><input type="text" name="id" id="id"><br/><br/>
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

$sql  = "DELETE FROM department WHERE department.id ='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<br> New record deleted successfully";
} else {
    echo "<br> Error: "."<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>
