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
 </table>
 </center>
</body>
</html>