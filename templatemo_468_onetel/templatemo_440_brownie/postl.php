<!DOCTYPE HTML>

<html>
	
	<body>

	

	


<style>
.error {color: #FF0000;}
</style>
<body> 
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
//$USNErr = $BUSROUTEErr = $PICKUPPOINTErr = $NAMEErr = "";
$nameErr = $addressErr  = $emailErr = $learnErr= $passwordErr=$cpasswordErr= $phoneErr= $domainErr="";
//$password;
//$phone=0;
//$name = $address  = $phoneErr= $passwordErr= $email = $learn="";
//$flag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "name is required";
   } else {
     $name = test_input($_POST["name"]);$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed"; 
}
	 
   }
   
   if (empty($_POST["address"])) {
     $addressErr = "address is required"; 
   } else {
	 $address = test_input($_POST["address"]);
	 
   } 
     
   if (empty($_POST["email"])) {
     $emailErr = "email is required";
   } else {
     $email = test_input($_POST["email"]);
	 $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format"; 
}
   } 
   //if (empty($_POST["phone"])) {
   //  $phoneErr = "phone no is required";
   //} else {
   //  $phone = test_input($_POST["phone"]);
   //}
    if (empty($_POST["password"])) {
     $passwordErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
   if (empty($_POST["cpassword"])) {
     $passwordErr = "password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
   if (empty($_POST["domain"])){
    $domainErr = "domain is required";
  } else {
    $domain = test_input($_POST["domain"]);
   }
   
    
   

   
}

function test_input($data) {
	$data = trim($data);
   $data = stripslashes($data);
	
   
   
   $data = htmlspecialchars($data);
   return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
 
  Animal type:<br>
  <input type="text" name="type"><br><br>
  Age:<br>
  <input type="text" name="age"><br><br>
  Description:<br>
  <input type="text" name="des" ><br><br>
  Location:<br>
  <input type="text" name="loc" ><br><br>
   Your contact number:<br>
  <input type="text" name="num"><br><br>

  <input type="submit" name="submit" value="submit">
</form>

<?php

//$pass=$_POST['password'];
//$enpass=md5($pass);
?>
<?php
if (isset($_POST['submit'])) {

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stray";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO post(animal_type, description, location, your_phone_number,age)
VALUES ('$_POST[type]', '$_POST[des]','$_POST[loc]' ,'$_POST[num]','$_POST[age]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
else{ //echo "confirm password not same";
}
?>


</body>
</html>
</body>
</html>

