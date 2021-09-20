<html>
	<head>
		<link rel="icon" href="download.jpg" type="image/x-icon">
		
		<title>WP Brigade Phase 1 Test</title>
		
		<link rel="stylesheet" href="\phase1-test\style.css">
		
	</head>

<!--PHP script start -->
<?php

	//declaration of variables
		$name         = '';
		$nameerr      = '';
		$email        = '';
		$emailerr     = '';
		$number       = '';
		$numbererr    = '';
		$lname        = '';
		$lnameerr     = '';
		$address      = '';
		$addresserr   = '';
		$password     = '';
		$passworderr  = '';
		$cpassword    = '';
		$cpassworderr = '';
		$gender       = '';
		$gendererr    = '';
		$termserr     = '';


	//if the form is submitted 
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		
		//Sanitization of form data
			$name      = filter_var( $_REQUEST['name'], FILTER_SANITIZE_STRING );
			$lname     = filter_var( $_REQUEST['lname'], FILTER_SANITIZE_STRING );
			$email	   = filter_var( $_REQUEST['email'], FILTER_SANITIZE_EMAIL );
			$number    = filter_var( $_REQUEST['number'], FILTER_SANITIZE_NUMBER_INT );
			$address   = filter_var( $_REQUEST['address'], FILTER_SANITIZE_STRING );
			$password  = filter_var( $_REQUEST['password'], FILTER_SANITIZE_STRING );
			$cpassword = filter_var( $_REQUEST['cpassword'], FILTER_SANITIZE_STRING );
			
		
		//validation of form data

		//first name
		if ( empty( $name ) ){
			$nameerr= "Enter name first";
		}
		
		elseif ( !preg_match( "/^[a-zA-Z-' ]*$/",$name ) ) {
			$nameerr = "Only letters and white space allowed";
		}
		elseif ( strlen( $name ) > 20 || strlen( $name ) < 2){
			$nameerr = "First name must be between 2 to 20";
		}

		//last name
		if ( empty( $lname ) ){
			$lnameerr = "Enter last name";
		}
		elseif ( !preg_match( "/^[a-zA-Z-' ]*$/", $lname ) ) {
			$lnameerr = "Only letters and white space allowed in last name";
		}
		elseif ( strlen( $lname ) > 20 || strlen( $lname ) < 2 ){
			$lnameerr = "Last name must be between 2 to 20";
		}

		//gender
		if ( array_key_exists ( 'gender', $_REQUEST ) ){
			$gender = $_POST['gender'];
		}
		elseif( empty( $gender ) ){
			$genderr = "Please Select Gender";
		}
		
		
		//email
		if ( empty ( $email ) ){
			$emailerr = "Please Enter The Email";
		}
		elseif ( !filter_var ( $email, FILTER_VALIDATE_EMAIL ) ){
			$emailerr = "Email is not valid!";
		}
		elseif ( strlen ( $email ) > 20 || strlen ( $email ) < 2 ){
			$emailerr = "Email must be between 2 to 20";
		}
		
		
		//number
		if ( empty( $number ) ){
			$numbererr = "please enter the number!";
		}
		elseif ( !preg_match( "/^[0][0-9]/", $number) ){
			$numbererr = "Number is not valid";
		}
		elseif ( strlen( $number ) !== 7){
			$numbererr = "Phone number must contains 7 numbers" ;
		}
		
		//address
		if ( empty ( $address ) ){
			$addresserr = "please enter the address!" ;
		}
		elseif ( !is_string( $address ) ){
			$addresserr = "Address is not valid" ;
		}
		elseif ( strlen( $address ) > 50 || strlen( $address ) < 10 ){
			$addresserr = "Address must be between 10 to 50";
		}

		//password
		if ( empty( $password ) ){
			$passworderr =  "please enter the password!";
		}
		elseif ( strlen( $password ) > 20 || strlen( $password ) < 6 ){
			$passworderr = "Password must be between 6 to 20" ;
		}
		elseif ( !is_string( $password ) ){
			$passworderr ="Password is not valid" ;
		}
		
		
		//confirm password
		if ( $password !== $cpassword ){
			$cpassworderr = "Password not matched!" ;
		}
		elseif ( empty( $cpassword) ){
			$cpassworderr = "please enter the confirm password!" ;
		}
		
		
		//terms
		if ( !isset( $_REQUEST['terms'] ) ){
			$termserr = "please accept the terms & conditions!";
		}


		//if there is no error
		if( empty( $nameerr )     &&
			empty( $lnameerr )    &&
			empty( $emailerr )    &&
			empty( $gendererr )   &&
			empty( $numbererr )   &&
			empty( $addresserr )  &&
			empty( $passworderr ) &&
			empty( $cpassworderr )
		){
		
			echo "<h1>Your form is submitted $name! </h1>";
		
		}
	}
?>
<!--PHP script ended -->

	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<!--First Name -->
			<label for="name" id="label">First Name</label>	<span>*</span>
			<?php echo "<span>" .$nameerr. "</span>" ?>
			<br>
			<input type="text" id="text" name="name" value="<?php echo $name;?>">

			<!--Last name -->
			<br>
			<label for="lname" id="label">Last Name</label>	<span>*</span>
			<?php echo "<span>" .$lnameerr. "</span>"?>
			<br>
			<input type="text" id="text" name="lname" value="<?php echo $lname;?>">

			<!--Gender -->
			<br>
			<label for="gender">Gender</label> <span>*</span>
			<?php echo "<span>" .$gendererr. "</span>"?>
			<br>
			<input type="radio" name="gender" value="Male"
			<?php if($gender==='Male'){echo "checked";}?>>Male
			<input type="radio" name="gender" value="Female"
			<?php if($gender==='Female'){echo "checked";}?>>Female
			
			
			<!--Email -->
			<br>
			<label for="email">Email</label> <span>*</span>
			<?php echo "<span>" .$emailerr. "</span>"?>
			<br>
			<input type="text" id="text" name="email" value="<?php echo $email;?>">
			
			<!--Number -->
			<br>
			<label for="number">Ph No.</label><span>*</span>
			<?php echo "<span>" .$numbererr. "</span>"?>
			<br>
			<input type="text"id="text" name="number" value="<?php echo $number; ?>">
			
			
			<!--Address -->
			<br>
			<label for="address">Address</label><span>*</span>
			<?php echo "<span>" .$addresserr. "</span>"?>
			<br>
			<input type="text"id="text" name="address" value="<?php echo $address; ?>">
			
			
			<!--Password -->
			<br>
			<label for="password">Password</label><span>*</span>
			<?php echo "<span>" .$passworderr. "</span>"?>
			
			<br>
			<input type="password"id="text" name="password" >
			
			
			<!--Confirm Password -->
			<br>
			<label for="cpassword">Confirm Password</label><span>*</span>
			<?php echo "<span>" .$cpassworderr. "</span>"?>
			<br>
			<input type="password"id="text" name="cpassword" >
			<br>

			<!-- Terms-->
			<br>
			<input type="checkbox" id="terms" name="terms">
			<label for="terms">I accept terms & conditions</label><span>*</span>
			<?php echo "<span>" .$termserr. "</span>"?>
			<br>
			
			<!--Submit Button -->
			<button type="submit">Submit
			</button>

			
		</form>
	</body>
</html>