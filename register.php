<html>
<title>
	<meta charset="utf-8" /> 
</title>
<body>
	<?php
		$userName = "";
		$password = "";
		$password2 = "";
		$userNameError = "";
		$passwordError = "";
		$password2Error = "";
		$everythingOK = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["username"]))
			{
				$userNameError = "Se necesita nombre de usuario.";
				$everythingOK = false;
			} else
			{
				$userName = test_input($_POST["username"]);
				$everythingOK = true;
			}

			if(empty($_POST["pass1"]))
			{
				$passwordError = "Ingrese contraseña";
				$everythingOK = false;
			} else
			{
				$password = test_input($_POST["pass1"]);
				$everythingOK = true;
			}
			
			if(empty($_POST["pass2"])){
				$password2Error = "Vuelva a ingresar contraseña.";
				$everythingOK = false;
			} else
			{
				$password2 = test_input($_POST["pass2"]);
				$everythingOK = true;
			}

			if(!empty($_POST["pass1"] && !empty($_POST["pass2"]))){
				if($password != $password2){
					$password2Error = "Las contrasenias son distintas";
					$everythingOK = false;
				}
			}

		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		function checkIfOk($data){
			if($data)
				return "confirm.php";
			else
				return htmlspecialchars($_SERVER["PHP_SELF"]);
		}

	?>
	<form method ="post" action ="<?php echo checkIfOk($everythingOK)?>">
		Ingrese nombre de Usuario:
		<input type="text" name="username" value="<?php echo $userName;?>"><span class="error"><?php echo $userNameError;?></span>
		<br>
		Ingrese contraseña:
		<input type="password" name="pass1" value="<?php echo $password;?>"><span class="error"><?php echo $passwordError;?></span>
		<br>
		Repetir contraseña:
		<input type="password" name="pass2" value="<?php echo $password2;?>"><span class="error"><?php echo $password2Error;?></span>
		<br>
		<input type="submit" name="enviar">
	</form>
	<?php
		
	?>
</body>
</html>