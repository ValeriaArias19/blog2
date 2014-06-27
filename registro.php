<?php
$mensaje = "";

if(isset($_POST['txtpass']))
{
	$nombre = $_POST["txtnombre"];
	$usuario = $_POST["txtusuario"];
	$password = $_POST["txtpass"];

		
	if(strlen($usuario)==0 OR strlen($password)==0)
		$mensaje = "Debe poner datos!!!";
	else
	{
		include_once("settings/settings.inc.php");

		$conexion= mysql_connect (SQL_HOST,SQL_USER,SQL_PWD);
		$db=mysql_select_db(SQL_DB,$conexion) or die (MySQL_error());

		$sql_usuario = "select * from usuarios where usuario = '$usuario'";
		$rs_usuario = mysql_query($sql_usuario, $conexion) or die(mysql_error());

		$total_usuario= mysql_num_rows($rs_usuario);
		if($total_usuario==1) {
				$mensaje = "El usuario ya existe";

			} else { 

				$sql_usuario = "INSERT into usuarios(nombre, usuario, password) values ('$nombre', '$usuario', '$password')"; 
				
				$rs_usuario = mysql_query($sql_usuario, $conexion) or die(mysql_error());
				header("location:login.php?error=4");
			}
		}
	}
?>

<doctype html>
<html>
 <head>
 	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Registro</title>

 </head>
<body>
<center>
 <table> 
	<form action="registro.php" method="post" name="registro"><br>
		<tr><td><center><h1>Registrate Aqui<h1></center><br><?php echo $mensaje; ?></td></tr>
		<tr><td><label>Nombre<input name="txtnombre" type="text"  id="txtnombre" value="" ></td></tr> 		 
		 <tr><td><label>Usuario<input name="txtusuario" type="text"  id="txtusuario" value="" ></td></tr>
		 <tr><td><label>Password<input name="txtpass" type="password" id="password"  value=""></td></tr>
		 <tr><td><input type="submit" value="Guardar"> </td></tr>
	</form>
	<tr><td><center><h1>Registrate Aqui<h1></center><br><?php echo $mensaje; ?></td></tr>
		<tr><td><div class="form-group">
		    <label for="exampleInputEmail1">Nombre</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresa tu nombre">
		 </div></td></tr>		 
		 <tr><td><div class="form-group">
		    <label for="exampleInputEmail1">Usuario</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresa tu usuario">
		 </div></td></tr>
		 <tr><td><div class="form-group">
		    <label for="exampleInputEmail1">password</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="password">
		 </div></td></tr>
		 <tr><td><input type="submit" value="Guardar"> </td></tr>
 </table>
 </center>
 	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
</body>
</html>