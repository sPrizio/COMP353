<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>
  Please enter the department ID to get all the projects assigned to this department :
</p>
</br>
<label>Department ID </label><input type="text" name="department_id" id="department_id"><br/><br/>
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
echo "Connected successfully <br>";

if(isset($_POST["department_id"])){
$department_id = mysqli_real_escape_string($conn, $_POST["department_id"]);
}
else{
 echo "POST department_id is not assigned";
}

$sql  = "SELECT responsible_for.project_id AS Project_ID, (SELECT project.name FROM project WHERE responsible_for.project_id=project.id) AS Project_Name FROM responsible_for WHERE department_id = $department_id ";

if(!empty($sql)){
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

// output data of each row
while($row = mysqli_fetch_assoc($result)) {
foreach($row as $k => $v){
echo $k." : ".$v." <br/>";
}
echo "<br>";
}
} else {
echo "0 results";
}
}
?>
