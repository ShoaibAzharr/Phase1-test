<html>
<head>
<link rel="stylesheet" href="\task-1\style.css">
</head>
<?php
$name=$email=$number=$lname=$address=$password=$cpassword="";
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
	if(empty($lname)){
		array_push($errorarray, "Enter last name");
	}
	if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		array_push($errorarray, "Only letters and white space allowed in last name");
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
	if(empty($address)){
		array_push($errorarray,"please enter the address!");
	}
	if(is_string($address)){
		array_push($errorarray,"Address is not valid");
	}
	if(empty($password)){
		array_push($errorarray,"please enter the password!");
	}
	if(is_string($password)){
		array_push($errorarray,"Password is not valid");
	}
	if(empty($cpassword)){
		array_push($errorarray,"please enter the confirm password!");
	}
}
?>
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<label for="name" id="label">First Name</label>	<span>*</span>
			<?php if(in_array("Enter name first", $errorarray)) echo "<span>Enter First Name</span>"?>
			<?php if(in_array("Only letters and white space allowed", $errorarray)) echo "<span>Only letters and white space allowed</span>"?>
			<br>
			<input type="text" id="text" name="lname" value="<?php echo $lname;?>">
			<br>
			<label for="lname" id="label">Last Name</label>	<span>*</span>
			<?php if(in_array("Enter last name", $errorarray)) echo "<span>Enter Last Name</span>"?>
			<?php if(in_array("Only letters and white space allowed in last name", $errorarray)) echo "<span>Only letters and white space allowed</span>"?>
			<br>
			<input type="text" id="text" name="name" value="<?php echo $name;?>">
			<br>
			<label for="gender">Gender</label><span>*</span>
			<?php if(in_array("Please Select Gender", $errorarray)) echo "<span>Please Select Gender</span>"?>
			<br>
			<input type="radio" name="gender" value="Male"
			<?php if($gender==='Male'){echo "checked";}?>>Male
			<input type="radio" name="gender" value="Female"
			<?php if($gender==='Female'){echo "checked";}?>>Female
			<label for="email">Email</label> <span>*</span>
			<?php if(in_array("Please Enter The Email", $errorarray)) echo "<span>Please Enter The Email</span>";
			elseif(in_array("Email is not valid!", $errorarray)) echo "<span>Email is not valid!</span>"?>
			<br>
			<input type="text" id="text" name="email" value="<?php echo $email;?>">
			<br>
			<label for="number">Ph No.</label><span>*</span>
			<?php if(in_array("please enter the number!", $errorarray)) echo "<span>Please enter the number!</span>";
			elseif(in_array("Number is not valid", $errorarray)) echo "<span>Number is not valid</span>"?>
			<br>
			<input type="text"id="text" name="number" value="<?php echo $number; ?>">
			<br>
			<label for="address">Address</label><span>*</span>
			<?php if(in_array("please enter the address!", $errorarray)) echo "<span>Please enter the address!</span>";
			elseif(in_array("Address is not valid", $errorarray)) echo "<span>Address is not valid</span>"?>
			<br>
			<input type="text"id="text" name="address" value="<?php echo $address; ?>">
			<br>
			<label for="password">Password</label><span>*</span>
			<?php if(in_array("please enter the password!", $errorarray)) echo "<span>Please enter the password!</span>";
			elseif(in_array("Password is not valid", $errorarray)) echo "<span>Password is not valid</span>"?>
			<br>
			<input type="text"id="text" name="password" value="<?php echo $password; ?>">
			<br>
			<label for="cpassword">Confirm Password</label><span>*</span>
			<?php if(in_array("please enter the confirm password!", $errorarray)) echo "<span>Please enter the confirm password!</span>";?>
			<br>
			<input type="text"id="text" name="cpassword" value="<?php echo $cpassword; ?>">
			<br>
			<input type="text"id="text" name="cpassword" value="<?php echo $cpassword; ?>">
			<label for="terms">I accept terms & conditions</label><span>*</span>
			<?php if(in_array("please accept the terms & conditions!", $errorarray)) echo "<span>Please accept the terms & conditions!</span>";?>
			<br>

			
			
			<button type="submit">Submit
			</button>
		</form>
	</body>
</html>