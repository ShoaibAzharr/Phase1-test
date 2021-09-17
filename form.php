<html>
<head>
<link rel="icon" href="download.jpg" type="image/x-icon">
<title>WP Brigade Phase 1 Test</title>
<link rel="stylesheet" href="\phase1-test\style.css">
</head>

<!--PHP script start -->
<?php

//declaration of variables
$name=$email=$number=$lname=$address=$password=$cpassword=$gender="";
$errorarray=array();

//if the form is submitted 
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	//Sanitization of form data
	$name=filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
	$lname=filter_var($_REQUEST['lname'],FILTER_SANITIZE_STRING);
	$email=filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
	$number=filter_var($_REQUEST['number'],FILTER_SANITIZE_NUMBER_INT);
	$address=filter_var($_REQUEST['address'],FILTER_SANITIZE_STRING);
	$password=filter_var($_REQUEST['password'], FILTER_SANITIZE_STRING);
	$cpassword=filter_var($_REQUEST['cpassword'], FILTER_SANITIZE_STRING);
	
	
	
	//validation of form data

	//first name
	if(empty($name)){
		array_push($errorarray, "Enter name first");
	}
	if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
		array_push($errorarray, "Only letters and white space allowed");
	}
	if(strlen($name)>20||strlen($name)<2){
		array_push($errorarray, "First name must be between 2 to 20");
	}

	//last name
	if(empty($lname)){
		array_push($errorarray, "Enter last name");
	}
	if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
		array_push($errorarray, "Only letters and white space allowed in last name");
	}
	if(strlen($lname)>20||strlen($lname)<2){
		array_push($errorarray, "Last name must be between 2 to 20");
	}

	//gender
	if(array_key_exists('gender', $_REQUEST)){
		$gender=$_POST['gender'];
	}
	if(empty($gender)){
		array_push($errorarray,"Please Select Gender");
	}
	
	
	//email
	if(empty($email)){
		array_push($errorarray,"Please Enter The Email");
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		array_push($errorarray, "Email is not valid!");
	}
	if(strlen($email)>20||strlen($email)<2){
		array_push($errorarray, "Email must be between 2 to 20");
	}
	
	
	//number
	if(empty($number)){
		array_push($errorarray,"please enter the number!");
	}
	if(!preg_match("/^[0][0-9]/", $number)){
		array_push($errorarray,"Number is not valid");
	}
	if(strlen($number)!=7){
		array_push($errorarray, "Phone number must contains 7 numbers");
	}
	
	//address
	if(empty($address)){
		array_push($errorarray,"please enter the address!");
	}
	if(!is_string($address)){
		array_push($errorarray,"Address is not valid");
	}
	if(strlen($address)>50||strlen($address)<10){
		array_push($errorarray, "Address must be between 10 to 50");
	}

	//password
	if(empty($password)){
		array_push($errorarray,"please enter the password!");
	}
	if(strlen($password)>20||strlen($password)<6){
		array_push($errorarray, "Password must be between 6 to 20");
	}
	if(!is_string($password)){
		array_push($errorarray,"Password is not valid");
	}
	
	
	//confirm password
	if($password!==$cpassword){
		array_push($errorarray,"Password not matched!");
	}
	if(empty($cpassword)){
		array_push($errorarray,"please enter the confirm password!");
	}
	
	
	//terms
	if(!isset($_REQUEST['terms'])){
		array_push($errorarray, "please accept the terms & conditions!");
	}


	//if there is no error
	if(empty($errorarray)){
		echo "<h1>Your form is submitted $name! </h1>";
	}
}
?>
<!--PHP script ended -->

	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<!--First Name -->
			<label for="name" id="label">First Name</label>	<span>*</span>
			<?php if(in_array("Enter name first", $errorarray)) echo "<span>Enter First Name!</span>";
			elseif(in_array("Only letters and white space allowed", $errorarray)) echo "<span>Only letters and white space allowed</span>";
			elseif(in_array("First name must be between 2 to 20",$errorarray)) echo "<span>First name must be between 2 to 20</span>"; ?>
			<br>
			<input type="text" id="text" name="name" placeholder="<?php echo $name;?>">

			<!--Last name -->
			<br>
			<label for="lname" id="label">Last Name</label>	<span>*</span>
			<?php if(in_array("Enter last name", $errorarray)) echo "<span>Enter Last Name!</span>";
			elseif(in_array("Only letters and white space allowed in last name", $errorarray)) echo "<span>Only letters and white space allowed!</span>";
			elseif(in_array("Last name must be between 2 to 20",$errorarray)) echo "<span>Last name must be between 2 to 20!</span>";?>
			<br>
			<input type="text" id="text" name="lname" placeholder="<?php echo $lname;?>">

			<!--Gender -->
			<br>
			<label for="gender">Gender</label> <span>*</span>
			<?php if(in_array("Please Select Gender", $errorarray)) echo "<span>Please Select Gender!</span>"?>
			<br>
			<input type="radio" name="gender" value="Male"
			<?php if($gender==='Male'){echo "checked";}?>>Male
			<input type="radio" name="gender" value="Female"
			<?php if($gender==='Female'){echo "checked";}?>>Female
			
			
			<!--Email -->
			<br>
			<label for="email">Email</label> <span>*</span>
			<?php if(in_array("Please Enter The Email", $errorarray)) echo "<span>Please Enter The Email!</span>";
			elseif(in_array("Email is not valid!", $errorarray)) echo "<span>Email is not valid!</span>";
			elseif(in_array("Email must be between 2 to 20",$errorarray)) echo "<span>Email must be between 2 to 20!</span>";?>
			<br>
			<input type="text" id="text" name="email" placeholder="<?php echo $email;?>">
			
			<!--Number -->
			<br>
			<label for="number">Ph No.</label><span>*</span>
			<?php if(in_array("please enter the number!", $errorarray)) echo "<span>Please enter the number!</span>";
			elseif(in_array("Number is not valid", $errorarray)) echo "<span>Number is not valid!</span>";
			elseif(in_array("Phone number must contains 7 numbers",$errorarray)) echo "<span>Phone number must contains 7 numbers!</span>";?>
			<br>
			<input type="text"id="text" name="number" placeholder="<?php echo $number; ?>">
			
			
			<!--Address -->
			<br>
			<label for="address">Address</label><span>*</span>
			<?php if(in_array("please enter the address!", $errorarray)) echo "<span>Please enter the address!</span>";
			elseif(in_array("Address is not valid", $errorarray)) echo "<span>Address is not valid!</span>";
			elseif(in_array("Address must be between 10 to 50",$errorarray)) echo "<span>Address must be between 10 to 50!</span>";?>
			<br>
			<input type="text"id="text" name="address" placeholder="<?php echo $address; ?>">
			
			
			<!--Password -->
			<br>
			<label for="password">Password</label><span>*</span>
			<?php if(in_array("please enter the password!", $errorarray)) echo "<span>Please enter the password!</span>";
			elseif(in_array("please enter the confirm password!", $errorarray)) echo "<span>Please enter the confirm password!</span>";
			elseif(in_array("Password is not valid", $errorarray)) echo "<span>Password is not valid!</span>";
			elseif(in_array("Password must be between 6 to 20",$errorarray)) echo "<span>Password must be between 6 to 20!</span>";?>
			
			<br>
			<input type="password"id="text" name="password" >
			
			
			<!--Confirm Password -->
			<br>
			<label for="cpassword">Confirm Password</label><span>*</span>
			<?php if(in_array("please enter the confirm password!", $errorarray)) echo "<span>Please enter the confirm password!</span>";
			elseif(in_array("Password not matched!",$errorarray)) echo "<span>Password not matched!</span>";?>
			<br>
			<input type="password"id="text" name="cpassword" >
			<br>

			<!-- Terms-->
			<br>
			<input type="checkbox" id="terms" name="terms">
			<label for="terms">I accept terms & conditions</label><span>*</span>
			<?php if(in_array("please accept the terms & conditions!", $errorarray)) echo "<span>Please accept the terms & conditions!</span>";?>
			<br>
			
			<!--Submit Button -->
			<button type="submit">Submit
			</button>

			
		</form>
	</body>
</html>