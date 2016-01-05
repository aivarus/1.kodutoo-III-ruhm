<?php
	// LOGIN.PHP
	
	$email_error = "";
	$password_error = "";
	
	$first_name_error = "";
	$last_name_error = "";
	
	$email_add = "";
	$email_add_error = "";
	
	$password_one = "";
	$password_one_error = "";
	
	$password_confirm = "";
	$password_confirm_error = "";
	
	$first_name = "";
	$last_name = "";
	
	$email = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if(isset($_POST["login"])){ 
			
			echo "vajutas login nuppu!";
			if ( empty($_POST["email"]) ) {
				$email_error = "See väli on kohustuslik";
			}
			
			if ( empty($_POST["password"]) ) {
				$password_error = "See väli on kohustuslik";
			} else {
				
				if(strlen($_POST["password"]) < 8) { 
				
					$password_error = "Peab olema vähemalt 8 tähemärki pikk!";
					
				}
				
			}
			
			if($email_error == "" && $password_error ==""){
				
				echo "kontrollin sisselogimist ".$email." ja parool ";
			}
		
		
		
		// keegi vajutas create nuppu
		}elseif(isset($_POST["create"])){
			
			echo "vajutas create nuppu!";
			
			//valideerimine create user vormile
			//kontrollin et e-post ei ole tühi
			if ( empty($_POST["firstname"]) ) {
				$first_name_error = "See väli on kohustuslik";
			}else{
				$first_name= test_input($_POST["first_name"]);
			}
			
			if ( empty($_POST["lastname"]) ) {
				$last_name_error = "See väli on kohustuslik";
			}else{
				$last_name = test_input($_POST["last_name"]);
			}
			
			if ( empty($_POST["email_add_email"]) ) {
				$email_add_error = "See väli on kohustuslik";
			}
			
			
			if ( empty($_POST["password_one"]) ) {
				$password_one_error = "See väli on kohustuslik";
			} else {
				
				if(strlen($_POST["password_one"]) < 8) { 
				
					$password_one_error = "Peab olema vähemalt 8 tähemärki pikk!";
					
				}
			}
				
			if ( empty($_POST["password_confirm"]) ) {
				$password_confirm_error = "See väli on kohustuslik";
			} else {
				
				if(strlen($_POST["password_one"]) < 8) { 
				
					$password_confirm_error = "Peab olema vähemalt 8 tähemärki pikk!";
					
				}
			}
			
		}
		
		
		
	}
	
	// eemaldab tahapahtlikud osad
	function test_input($data) {
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	}
?>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<h2>Log in</h2>
	<form action="login.php" method="POST" >
		<input name="email" type="email" placeholder="E-post"> <?php echo $email_error; ?><br><br>
		<input name="password" type="password" placeholder="Parool"> <?php echo $password_error; ?> <br><br>
		<input name="login" type="submit" value="Log in">
		
	</form>
	
	<h2>Create user</h2>
	<form action="login.php" method="POST" >
		<input name="First_name" type="name" placeholder="First name"> <?php echo $first_name_error; ?> <br><br>
		<input name="Last_name" type="name" placeholder="Last name"> <?php echo $last_name_error; ?> <br><br>
		<input name="email_add" type="email" placeholder="Email"> <?php echo $email_add_error; ?> <br><br>
				
		<input name="password_one" type="password" placeholder="Password"> <?php echo $password_one_error; ?> <br><br>
		<input name="password_confirm" type="password" placeholder="Re-enter Password"> <?php echo $password_confirm_error; ?>  <br><br>
		<input name="create" type="submit" value="Create"><br>
		 
		 <form>Minu idee on teha Eesti judoliidu foorum, kus kõik judoklubid saavad üksteisega lihtsalt eesti judo asju arutada, postitada oma võistlusjuhendeid ning ning muud kasuliku.</form>

</body>

</html>