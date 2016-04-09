<?php
//session_start();
error_reporting(0);
$x=$y=$z=$w=$s=$y="";



// Geolocation detection with JavaScript, HTML5 and PHP
// http://locationdetection.mobi/
// Andy Moore
// http://andymoore.info/
// this is linkware if you use it please link to me:
// <a href="http://web2txt.co.uk/">Mp3 Downloads</a>

$geo = 'http://maps.google.com/maps/api/geocode/xml?latlng='.htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))).'&sensor=true';

$xml = simplexml_load_file($geo);

foreach($xml->result->address_component as $component){
	if($component->type=='street_address'){
		$geodata['precise_address'] = $component->long_name;
	}
	if($component->type=='natural_feature'){
		$geodata['natural_feature'] = $component->long_name;
	}
	if($component->type=='airport'){
		$geodata['airport'] = $component->long_name;
	}
	if($component->type=='park'){
		$geodata['park'] = $component->long_name;
	}
	if($component->type=='point_of_interest'){
		$geodata['point_of_interest'] = $component->long_name;
	}
	if($component->type=='premise'){
		$geodata['named_location'] = $component->long_name;
	}
	if($component->type=='street_number'){
		$geodata['house_number'] = $component->long_name;
	}
	if($component->type=='route'){
		$geodata['street'] = $component->long_name;
		
		$globals['w']=$geodata['street'];
	}
	if($component->type=='locality'){
		$geodata['town_city'] = $component->long_name;
		$z=$geodata['town_city'];
	}
	if($component->type=='administrative_area_level_3'){
		$geodata['district_region'] = $component->long_name;
	}
	if($component->type=='neighborhood'){
		$geodata['neighborhood'] = $component->long_name;
		$globals['y']=$geodata['neighborhood'];
	}
	if($component->type=='colloquial_area'){
		$geodata['locally_known_as'] = $component->long_name;
	}
	if($component->type=='administrative_area_level_2'){
		$geodata['county_state'] = $component->long_name;
		$globals['s']=$geodata['county_state'];
	}
	if($component->type=='postal_code'){
		$geodata['postcode'] = $component->long_name;
	}
	if($component->type=='country'){
		$geodata['country'] = $component->long_name;
		$globals['x']=$geodata['country'];
	}
}

//list($lat,$long) = explode(',',htmlentities(htmlspecialchars(strip_tags($_GET['latlng']))));
//geodata['latitude'] = $lat;
//$geodata['longitude'] = $long;
$geodata['formatted_address'] = $xml->result->formatted_address;
//$geodata['accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['accuracy'])));
//$geodata['altitude'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude'])));
//$geodata['altitude_accuracy'] = htmlentities(htmlspecialchars(strip_tags($_GET['altitude_accuracy'])));
//$geodata['directional_heading'] = htmlentities(htmlspecialchars(strip_tags($_GET['heading'])));
//$geodata['speed'] = htmlentities(htmlspecialchars(strip_tags($_GET['speed'])));
$geodata['google_api_src'] = $geo;
//echo '<img src="http://maps.google.com/maps/api/staticmap?center='.$lat.','.$long.'&zoom=14&size=150x150&maptype=roadmap&&sensor=true" width="150" height="150" alt="'.$geodata['formatted_address'].'" \/><br /><br />';
//echo 'Latitude: '.$lat.' Longitude: '.$long.'<br />';
foreach($geodata as $name => $value){
	echo ''.$name.': '.str_replace('&','&amp;',$value).'<br />';
	
}
//echo "$x";
//$_SESSION['x'] = $x;
//$_SESSION['y'] = $y;
//$_SESSION['w'] = $w;
//$_SESSION['z'] = $z;
?>
<?php
error_reporting(0);
//session_start();
$x=$y=$z=$w=$r=$p="";
//$x=$_SESSION['x'];
//$y=$_SESSION['y'];
//$w=$_SESSION['w'];
//$z=$_SESSION['z'];
echo "KNOW YOUR LOCATION! ";
echo '<a href="map.html">GET MAP</a>';
//echo $globals['s'];

$r=$globals['s'];

$p=$globals['y'];
echo "$r";
echo "$p";


//echo $globals['x'];




$ans="";
//session_unset();
//session_destroy();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
SEARCH
<input type="text" name="ans">
<br>

<input type="submit" name="submit" value="Submit">
</form>
<?php
$key="";
echo "$w";
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
$sql="SELECT distinct id,shop_name,product_name,info,address from furniture where product_name LIKE '%$ans%' ";
$sql4="SELECT distinct id,shop_name,product_name,info,address from furniture where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$sql1="SELECT distinct shop_name,product_name,info,address from holi where product_name LIKE '%$ans%'";
$sql5="SELECT distinct shop_name,product_name,info,address from holi where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$sql2="SELECT distinct shop_name,product_name,info,address from ganesha where product_name LIKE '%$ans%'";
$sql6="SELECT distinct shop_name,product_name,info,address from ganesha where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$result = $conn->query($sql);

$result1= $conn->query($sql1);
$result2= $conn->query($sql2);
$result4= $conn->query($sql4);
$result5= $conn->query($sql5);
$result6= $conn->query($sql6);

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
if ($result4->num_rows > 0) {
	echo "NEAR YOU!!!!!!!!";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result4->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
if ($result5->num_rows > 0) {
	echo "NEAR YOU!!!!!!!!!";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result5->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
if ($result6->num_rows > 0) {
	echo "NEAR YOU!!!!!!!!!!!";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result6->fetch_assoc()) {
         
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
echo "<br></br>";
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
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   // echo "</table>";
} else {
   // echo "0 results";
}
}

 if(isset($_POST['HOLI'])){
	 echo "NEAR YOU!!!!!!!!!!!!";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM holi where address LIKE '%$r%' OR address LIKE '%$p'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
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
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   // echo "</table>";
} else {
    echo "0 results";
}
 }
if(isset($_POST['GANESHA'])){
	echo "NEAR YOU!!!!!!!!!!!!!";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM ganesha where address LIKE '%$r%' OR address LIKE '%p%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   // echo "</table>";
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
echo "<br></br>";
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
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   // echo "</table>";
} else {
    //echo "0 results";
}
 }
 if(isset($_POST['FURNITURE'])){
	 echo "NEAR YOU!!!!!!!";
	 
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
$sql = "SELECT id,shop_name,product_name,info,address FROM furniture where address LIKE '%$r%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         
        echo " <br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."";
        
    }
   // echo "</table>";
} else {
    //echo "0 results";
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





