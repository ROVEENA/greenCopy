<!DOCTYPE HTML>
<html>
<head>
<body>
<?php
session_start();
$x=$y=$z=$w="";
$x=$_SESSION['x'];
$y=$_SESSION['y'];
$w=$_SESSION['w'];
$z=$_SESSION['z'];
echo "KNOW YOUR LOCATION";
echo '<a href="geo.html">GET GRAPH</a>';
echo $x;


$ans="";
session_unset();
session_destroy();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
SEARCH
<input type="text" name="ans">
<br>

<input type="submit" name="submit" value="Submit">
</form>
<?php
$key="";
echo "<br></br>";
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

//$sql = "SELECT distinct f.shop_name ,f.product_name,f.info,f.address, h.shop_name,h.product_name,h.info,h.address, g.shop_name,g.product_name,g.info,g.address FROM furniture f,holi h,ganesha g where f.product_name LIKE '%$ans%' OR h.product_name LIKE '%$ans%' OR g.product_name LIKE '%$ans%' ";
$sql="SELECT distinct id,shop_name,product_name,info,address from furniture where product_name LIKE '%$ans%'";
$sql1="SELECT distinct shop_name,product_name,info,address from holi where product_name LIKE '%$ans%'";
$sql2="SELECT distinct shop_name,product_name,info,address from ganesha where product_name LIKE '%$ans%'";


$result = $conn->query($sql);

$result1= $conn->query($sql1);
$result2= $conn->query($sql2);
if ($result2->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result2->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}



if ($result1->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result1->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}

$conn->close();
 }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="HOLI" value="HOLI" />
</form>
<?php
echo "<cr></br>";
 if(isset($_POST['HOLI'])){
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM holi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."";
        
    }
   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 }
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="GANESHA" value="GANESHA" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['GANESHA'])){
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM ganesha";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."";
        
    }
   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 }
?><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="FURNITURE" value="FURNITURE" />
</form>
<?php
echo "<cr></br>";
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
$sql = "SELECT id,shop_name,product_name,info,address FROM furniture";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."";
        
    }
   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="DIWALI" value="DIWALI" />
</form>
<?php
echo "<br></br>";
if(isset($_POST['DIWALI'])){
	echo "6 ways to celebrate eco  friendly diwali <br></br>
•	Use oil diyas instead of candles<br></Br>
•	Make your rangoli with flowers,natural colours,or rice flour<br></br>
•	When buying sweets re-use existing cardboard boxes from home<br></br>
•	Give a handmade gifts<br></br>
•	 Wrap your  gifts  in newspaper<br></br>
•	Shop for your festive needs at your nearby local shop rather than online s<br></br>
";
}
?>



</body>
</head>
</html>
