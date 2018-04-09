<html>
<head>
<meta charset="UTF-8">
<title>Get Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h3>
  Please enter the employee's ID to get the total hours worked on the project :
</h3>
</br>
<label>EMPLOYEE ID </label><input type="text" name="employee_id" id="employee_id"><br/><br/>
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

if(isset( $_POST["employee_id"])){
$employee_id = mysqli_real_escape_string($conn, $_POST["employee_id"]);
}
else{
 echo "POST employee_id is not assigned";
}

if(isset($_POST["project_id"])){
$project_id = mysqli_real_escape_string($conn, $_POST["project_id"]);
}
else{
 echo "POST project_id is not assigned";
}

$sql  = "SELECT hours_worked FROM works_on, employee WHERE employee.id = '$employee_id' AND project_id = '$project_id' AND employee.id=works_on.employee_id ";

if(!empty($sql)){
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

// output data of each row
while($row = mysqli_fetch_assoc($result)) {
foreach($row as $k => $v){
echo $k." : ".$v." ";
}
echo "<br>";
}
} else {
echo "0 results";
}
}
?>
