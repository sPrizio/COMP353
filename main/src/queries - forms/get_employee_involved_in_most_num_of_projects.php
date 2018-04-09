<html>
<head>
<meta charset="UTF-8">
<title>Get Query</title>
</head>
<body>
<h3>
Show the employee who is involved in the least number of projects :
</h3>
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

$sql  = "SELECT works_on.employee_id, employee.first_name, employee.last_name
FROM works_on
JOIN employee
on employee.id=works_on.employee_id
Group by employee_id
Order by COUNT(project_id) Desc
LIMIT 1";

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
