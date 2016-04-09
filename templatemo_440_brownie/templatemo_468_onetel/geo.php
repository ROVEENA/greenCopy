<!DOCTYPE html>
<html lang="en">
<head>
	<title>Onetel Bootstrap Template</title>
    <meta name="keywords" content="">
	<meta name="description" content="">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 
OneTel Template
http://www.templatemo.com/tm-468-onetel
-->
	<!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
	<!-- google web font css -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>

	
<!-- navigation -->

<!--	<div class="container">
		<div class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand"><img src="images/logo.png" class="img-responsive" alt=""></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.html" class="active">HOME</a></li>
			
				<li><a href="contact.html">CONTACT</a></li>
			</ul>
		</div>
	</div>
</div>	-->	

<!-- home section 
<div id="home">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-3"></div>
			<div class="col-md-7 col-sm-9">
				<h3>WHY YOU SHOULD GO</h3>
				<h1>FOR OUR SITE?</h1>
			</div>
		</div>
	</div>
</div> -->

<!-- divider section 
<div class="divider">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="divider-wrapper divider-one">
					<i class="fa fa-laptop"></i>
					<h2>ORGANIC</h2>
					
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="divider-wrapper divider-two">
					<i class="fa fa-mobile"></i>
					<h2>ECO-FRIENDLY</h2>
					
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="divider-wrapper divider-three">
					<i class="fa fa-life-ring"></i>
					<h2>RECYCLED</h2>
									</div>
			</div>
		</div>
	</div>
</div>-->


<!-- portfolio section -->
<div id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12">
				<h2>SEARCH FOR ORGANIC PRODUCTS HERE!</h2>
                <p>
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
$s="";
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

$sql7="SELECT distinct shop_name,product_name,info,address from jute where product_name LIKE '%$ans%'";
$sql8="SELECT distinct shop_name,product_name,info,address from jute where address LIKE '%$r%' AND product_name LIKE '%$ans%'";


$sql9="SELECT distinct shop_name,product_name,info,address from medicine where product_name LIKE '%$ans%'";
$sql10="SELECT distinct shop_name,product_name,info,address from medicine where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$sql11="SELECT distinct shop_name,product_name,info,address from recycled where product_name LIKE '%$ans%'";
$sql12="SELECT distinct shop_name,product_name,info,address from recycled where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$sql13="SELECT distinct shop_name,product_name,info,address from electric where product_name LIKE '%$ans%'";
$sql14="SELECT distinct shop_name,product_name,info,address from electric where address LIKE '%$r%' AND product_name LIKE '%$ans%'";

$result = $conn->query($sql);

$result1= $conn->query($sql1);
$result2= $conn->query($sql2);
$result4= $conn->query($sql4);
$result5= $conn->query($sql5);
$result6= $conn->query($sql6);

$result7= $conn->query($sql7);
$result8= $conn->query($sql8);

$result9= $conn->query($sql9);
$result10= $conn->query($sql10);

$result11= $conn->query($sql11);
$result12= $conn->query($sql12);

$result13= $conn->query($sql13);
$result14= $conn->query($sql14);
if ($result2->num_rows > 0) {
	$s=1;
	echo "price ranging from Rs.999 to Rs.10000<br></br>";
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
	$s=1;
	echo "price ranging from Rs.100 to Rs.360<br></br>";
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
	$s=1;
	echo "<br></br>price ranging from Rs.3000 to Rs.50000<br></br>";
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
	$s=1;
	echo "NEAR YOU!!!!!!!!";
	echo "<br></br>price ranging from Rs.3000 to Rs.50000<br></br>";
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
	$s=1;
	echo "NEAR YOU!!!!!!!!!<br></br>";
	echo "price ranging from Rs.100 to Rs.360<br></br>";
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
	$s=1;
	echo "NEAR YOU!!!!!!!!!!!<br></br>";
	echo "price ranging from Rs.999 to Rs.10000<br></br>";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result6->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}

if ($result7->num_rows > 0) {
	$s=1;
	echo "<br></br>price ranging from Rs.199 to Rs.500<br></br>";
	
	
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result7->fetch_assoc()) {
		$s=1;
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}


if ($result8->num_rows > 0) {
	$s=1;
	echo "NEAR YOU!!!!!!!!!!!";
	echo "<br></br>price ranging from Rs.199 to Rs.500<br></br>";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result8->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}

if ($result9->num_rows > 0) {
	$s=1;
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result9->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}


if ($result10->num_rows > 0) {
	$s=1;
	echo "NEAR YOU!!!!!!!!!!!";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result10->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
if ($result11->num_rows > 0) {
	$s=1;
	echo "<br></br>price ranging from Rs.250 to Rs.1500<br></br>";
	
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result11->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}


if ($result12->num_rows > 0) {
	$s=1;
	echo "NEAR YOU!!!!!!!!!!!";
	echo "<br></br>price ranging from Rs.250 to Rs.1500<br></br>";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result12->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
if ($result13->num_rows > 0) {
	$s=1;
	echo "<br></br>price ranging from Rs.92000 to Rs.5.9lakh<br></br>";
	
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result13->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}


if ($result14->num_rows > 0) {
	$s=1;
	echo "NEAR YOU!!!!!!!!!!!";
	echo "<br></br>price ranging from Rs.92000 to Rs.5.9lakh<br></br>";
    //echo "<table><tr><th>name</th><th>pickup</th><th>time</th></tr>";
    // output data of each row
    while($row = $result14->fetch_assoc()) {
         
        echo "<br></br>*shop name:".$row["shop_name"]." product:".$row["product_name"]."<br></br> ".$row["info"].""."<br></br> ".$row["address"]."<br></br>";
        
    }
   echo "</table>";
} else {
   // echo "0 results";
}
$conn->close();
if($s!=1)
{
	echo "<br></br>find your desired organic products here!<br></br>";
	$url = "http://www.potterybarn.com/shop/ideas-inspiration/eco-friendly/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
echo $curl_scraped_page;
	
}


 }
 
?>


<p>CLICK ON THIS TO KNOW WHERE YOU GET HOLI ORGANIC PRODUCTS</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="HOLI" value="HOLI" />
</form>
<?php
echo "<br></br>";
//echo "price ranging from Rs.100 to Rs.360";
//echo "displayed directly with php incase sql database doesnt work for you guys ";
//displayed directly with php incase sql database doesnt work for you guys
if(isset($_POST['HOLI'])){
	echo "price ranging from Rs.100 to Rs.360 <br></br>";
	
	echo "displayed directly with php with echo  incase sql database doesnt work for you guys to give an example of whats inside database <br></br>";
	
	echo "*shop name:GRAMEENA ANGADI product:HOLI COLOURS!

OBTAIN ECO-FREIENDLY,HARMLESS HOLI COLOURS

#8,opposite shalini playground,11th main Jaynagar 4th t block,Bangalore <br></br>



*shop name:FRESH EARTH ORGANIC product:HOLI COLOURS!

OBTAIN ECO-FREIENDLY,HARMLESS HOLI COLOURS

Near chimmaya hospital,cmh road,indiranagar,bangalore<br></br>



*shop name:ERA ORGANIC product:HOLI COLOURS

OBTAIN ECO-FREIENDLY AND HARMLESS COLOURS HERE!

Opp shanthi sagar,rmv club double road,2nd stage ,Bangalore<br></br>



*shop name:SERENITY product:HOLI COLOURS

OBTAIN ECO-FREIENDLY AND HARMLESS COLOURS HERE!

Near supermarket,10th main jayamahal extension, Bangalore <br></br>



*shop name:IHA NATURALS product:HOLI COLOURS AND MANY MORE!

OBTAIN ECO-FREIENDLY AND HARMLESS COLOURS HERE!

Shop no 2,behind lg godown,bassappa layout,pattangere,omkar hills road,rajarajeshwari nagar,bangalor <br></br>



*shop name:VRIKSH THE ORGANIC STORE product:HOLI COLOURS AND MANY MORE!

OBTAIN ECO-FREIENDLY AND HARMLESS COLOURS HERE!

Near 11th cross,ganesh temple,3rd main,vaiyyalikaval,Bangalore<br></br>



*shop name:NAMMANE ORGANICS product:HOLI COLOURS AND MANY MORE!

OBTAIN ECO FRIENDLY COLOURS AND HARMLESS COLOURS HERE!

Near cyber gym,18th cross 8th main,malleshwaram,Bangalore<br></br>



*shop name:NISARGA SHOPPE product:HOLI COLOURS AND MANY MORE!

OBTAIN ECO FRIENDLY COLOURS AND HARMLESS COLOURS HERE!

Lakeview farm,next shell petrol bunk,ramagondanahahalli main road,varthur main road,whitefield <br></br>";

	
	 
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
<p>CLICK ON THIS TO KNOW WHERE YOU GET GANESHA CLAY IDOLS </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="GANESHA" value="GANESHA" />

</form>
<?php
echo "<br></br>";
//echo "price ranging from Rs.999 to Rs.10000<br></br>";
 if(isset($_POST['GANESHA'])){
	 echo "<br></br>price ranging from Rs.999 to Rs.10000<br></br>";
	 
	 
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
	echo "<br></br>price ranging from Rs.999 to Rs.10000<br></br>";
	 
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
<p>CLICK ON THIS TO KNOW WHERE YOU GET WOODEN ECO_FRIENDLY FURNITURE </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="FURNITURE" value="FURNITURE" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['FURNITURE'])){
	 echo "<br></br>price ranging from Rs.3000 to Rs.50000<br></br>";
	 
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
	 echo "<br></br>price ranging from Rs.3000 to Rs.50000<br></br>";
	 
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
<p>CLICK ON THIS TO KNOW HOW YOU CAN CELEBRATE DIWALI IN ECO_FRIENDLY MANNER! </p>
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
<p>CLICK ON THIS TO KNOW WHERE YOU GET JUTE PRODUCTS! </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="JUTE" value="JUTE" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['JUTE'])){
	 echo "<br></br>price ranging from Rs.199 to Rs.500<br></br>";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM jute ";
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
 if(isset($_POST['JUTE'])){
	 echo "NEAR YOU!!!!!!!";
	 echo "<br></br>price ranging from Rs.199 to Rs.500<br></br>";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM jute  where address LIKE '%$r%' OR address LIKE '$p'";
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
<p>CLICK ON THIS TO KNOW WHERE YOU GET GENERIC MEDICINE! </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="MEDICINE" value="MEDICINE" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['MEDICINE'])){
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM medicine ";
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
 if(isset($_POST['MEDICINE'])){
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
$sql = "SELECT shop_name,product_name,info,address FROM medicine where address LIKE '%$r%' OR address LIKE '$p'";
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
<p>CLICK ON THIS TO KNOW WHERE YOU GET RECYCLED PRODUCTS! </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="RECYCLED" value="RECYCLED" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['RECYCLED'])){
	 echo "<br></br>price ranging from Rs.250 to Rs.1500<br></br>";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM recycled ";
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
 if(isset($_POST['RECYCLED'])){
	 echo "NEAR YOU!!!!!!!";
	 echo "<br></br>price ranging from Rs.250 to Rs.1500<br></br>";
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
$sql = "SELECT shop_name,product_name,info,address FROM recycled where address LIKE '%$r%' OR address LIKE '$p'";
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
<p>CLICK ON THIS TO KNOW WHERE YOU ELECTRIC CARS </p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="submit" name="ELECTRIC_CARS" value="ELECTRIC_CARS" />
</form>
<?php
echo "<br></br>";
 if(isset($_POST['ELECTRIC_CARS'])){
	  echo "<br></br>price ranging from Rs.92000 to Rs.5.9lakh<br></br>";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM electric ";
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
 if(isset($_POST['ELECTRIC_CARS'])){
	 echo "NEAR YOU!!!!!!!";
	 echo "<br></br>price ranging from Rs.92000 to Rs.5.9lakh<br></br>";
	 
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
$sql = "SELECT shop_name,product_name,info,address FROM electric where address LIKE '%$r%' OR address LIKE '$p'";
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






</body>
</head>
</html>
<!--</p>
			</div>
         </div>
         
         <div class="row mt30">
            
			<div class="col-md-4 col-sm-4 col-xs-6">
				<a href="images/portfolio-img1.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img1.jpg" alt="portfolio img"></a>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6">
				<a href="images/portfolio-img2.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img2.jpg" alt="portfolio img"></a>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6">
				<a href="images/portfolio-img3.jpg" data-lightbox-gallery="portfolio-gallery"><img src="images/portfolio-img3.jpg" alt="portfolio img"></a>
			</div>
            
		
</div>	-->	

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
        
			<div class="col-md-5 col-sm-4">
				
				
			</div>

			<div class="col-md-3 col-sm-4">
			
			</div>
            
			<div class="col-md-4 col-sm-4 newsletter">				<div class="input-group">
           	    	
				 </div>
			</div>
            
		</div>
	</div>
</footer>

<!-- copyright section 
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<p></p>
			</div>
			<div class="col-md-6 col-sm-6">
				<ul class="social-icons">
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-pinterest"></a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div> -->


<!-- javascript js -->	<a href="https://twitter.com/intent/tweet?button_hashtag=SHOPGREEN!&text=Check%20out%20GREEN%20BUYERGY" class="twitter-hashtag-button" data-size="large">Tweet #SHOPGREEN!</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>






