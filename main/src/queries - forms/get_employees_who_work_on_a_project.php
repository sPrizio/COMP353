<html>
<head>
<meta charset="UTF-8">
<title>Get Query</title>
</head>
<body>
<h3>
  SHOW WHICH DEPARTMENT MANAGER IS ALSO THE MANAGER OF SOME PROJECTS ?
</h3>
</br>

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

$sql  = "SELECT employee.id AS Manager_ID,employee.first_name, employee.last_name FROM department JOIN responsible_for ON department.id=responsible_for.department_id JOIN employee ON employee.id=department.manager_id JOIN works_on ON works_on.project_id=responsible_for.project_id AND works_on.employee_id=department.manager_id ";

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
