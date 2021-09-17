<html>
<head>
<link rel="stylesheet" href="\task-1\style.css">
</head>
<?php
$name=$email=$number="";
$gender="";
$errorarray=array();
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	if(array_key_exists('gender', $_REQUEST)){
		$gender=$_POST['gender'];
	}
	$name=filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
	$email=filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
	$number=filter_var($_REQUEST['number'],FILTER_SANITIZE_NUMBER_INT);
	if(empty($name)){
		array_push($errorarray, "Enter name first");
	}
	if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		array_push($errorarray, "Only letters and white space allowed");
	}
	if(empty($email)){
		array_push($errorarray,"Please Enter The Email");
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		array_push($errorarray, "Email is not valid!");
	}
	if(empty($number)){
		array_push($errorarray,"please enter the number!");
	}
	if(!preg_match("/^[0][0-9]{10,11}\z/", $number)){
		array_push($errorarray,"Number is not valid");
	}
	if(empty($gender)){
		array_push($errorarray,"Please Select Gender");
	}
	if(empty($errorarray)){
		echo "<h1>Welcome $name! </h1>";
	}
	
}
?>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<label for="name" id="label">Name</label>	<span>*</span>
<?php if(in_array("Enter name first", $errorarray)) echo "<span>Enter name first</span>"?>
<?php if(in_array("Only letters and white space allowed", $errorarray)) echo "<span>Only letters and white space allowed</span>"?>
<br>
<input type="text" id="text" name="name" value="<?php echo $name;?>">
<br>
<label for="email">Email</label> <span>*</span>
<?php if(in_array("Please Enter The Email", $errorarray)) echo "<span>Please Enter The Email</span>";
elseif(in_array("Email is not valid!", $errorarray)) echo "<span>Email is not valid!</span>"?>
<br>
<input type="text" id="text" name="email" value="<?php echo $email;?>">
<br>
<label for="number">Ph No.</label><span>*</span>
<?php if(in_array("please enter the number!", $errorarray)) echo "<span>please enter the number!</span>";
elseif(in_array("Number is not valid", $errorarray)) echo "<span>Number is not valid</span>"?>
<br>
<input type="text"id="text" name="number" value="<?php echo $number; ?>">
<br>
<br>
<label for="gender">Gender</label><span>*</span>
<?php if(in_array("Please Select Gender", $errorarray)) echo "<span>Please Select Gender</span>"?>
<br>
<input type="radio" name="gender" value="Male"
<?php if($gender==='Male'){echo "checked";}?>>Male
<input type="radio" name="gender" value="Female"
<?php if($gender==='Female'){echo "checked";}?>>Female
<button type="submit">Submit
</button>
</form>
</body>
</html>