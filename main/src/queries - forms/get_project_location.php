<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>
  Please enter the project ID to get the total number of hours spent on the project :
</p>
</br>
<label>PROJECT ID </label><input type="text" name="project_id" id="project_id"><br/><br/>
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

if(isset($_POST["project_id"])){
$project_id = mysqli_real_escape_string($conn, $_POST["project_id"]);
}
else{
 echo "POST project_id is not assigned";
}

$sql  = "SELECT project.location_id AS Location_ID, (SELECT location.name FROM location WHERE project.location_id=location.id) AS Location_name, (SELECT location.address FROM location WHERE project.location_id=location.id) AS Address FROM project WHERE project.id ='1'";

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
