<!DOCTYPE HTML>
<html>
<head>
<body>
<?php
$ans="";

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
SEARCH
<input type="text" name="ans">
<br>

<input type="submit" name="submit" value="Submit">
</form>
<?php
$key="";
 if(isset($_POST['submit'])){
	 $ans=$_POST['ans'];
	 
	 echo "$ans";
	 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "green";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT shop_name,product_name,info,address FROM furniture where product_name LIKE '%$ans%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="FURNITURE" value="FURNITURE" />
</form>
<?php
 if(isset($_POST['FURNITURE'])){
	 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "green";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT shop_name,product_name,info,address FROM furniture";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."";
        
    }
   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 }
?>
</body>
</head>
</html>
