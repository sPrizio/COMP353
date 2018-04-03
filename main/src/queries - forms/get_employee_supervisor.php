<html>
<head>
<meta charset="UTF-8">
<title>Insert Query</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>
  Please enter the employee's ID to know who is his supervisor :
</p>
</br>
<label>EMPLOYEE ID </label><input type="text" name="employee_id" id="employee_id"><br/><br/>
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


$sql  = "SELECT role.supervisor_id AS Supervisor_ID, (SELECT first_name FROM employee WHERE role.supervisor_id=employee.id ) AS First_Name, (SELECT last_name FROM employee WHERE role.supervisor_id=employee.id ) AS Last_Name FROM role, employee WHERE role.employee_id='$employee_id' AND employee.id=role.employee_id";

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
