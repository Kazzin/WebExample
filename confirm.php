<html>
<title>
</title>
<body>
	<?php
		$user = $_POST["username"];
		$password = $_POST["pass1"];
		$conexion = mysqli_connect("localhost","root","","test login") or
   		 die("Problemas con la conexión");

		mysqli_query($conexion,"insert into users(userName, pass) values 
                       ('$user','$password')")
  		 or die("Problemas en el select".mysqli_error($conexion));

		mysqli_close($conexion);
		echo "Se hizo todo correctamente amego."

	?>

</body>
</html>