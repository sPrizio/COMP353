<html>
<head>
<meta charset="utf-8">
<title>query</title>
</head>
<body>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
query:<input type="text" name="query" size = "50" value = "<?php echo $_POST["query"
];?>">
<input type="submit" value="submit">
</form>
<?php
//use you own account
$servername = "kzc353.encs.concordia.ca";
$username = "kzc353_4";
$password = "teamtita";
$dbname = "kzc353_4";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = $_POST["query"];
if(!empty($sql)){
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
foreach($row as $k => $v){
echo $k."->".$v." ";
}
echo "<br>";
}
} else {
echo "0 results";
}
}
?>
</body>
</html>