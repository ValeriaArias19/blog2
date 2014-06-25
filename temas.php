<?php
$mensaje = "";

if(isset($_POST['txttemas']))
{
	$titulo = $_POST["txttemas"];
	$contenido = $_POST["txtcontenido"];
		

	if(strlen($titulo)==0 OR strlen($contenido)==0)
		$mensaje = "Debe poner datos!!!";
	else
	{
		session_start();
		include_once("settings/settings.inc.php");
		$conexion= mysql_connect (SQL_HOST,SQL_USER,SQL_PWD);
		$db=mysql_select_db(SQL_DB,$conexion) or die (MySQL_error());
		$sql_Titulo ="INSERT INTO blog.temas (id_usuario, titulo, contenido) VALUES ('".$_SESSION['idusr']."', '".$titulo."', '".$contenido."')";
		$rs_Titulo = mysql_query($sql_Titulo, $conexion) or die(mysql_error());
		header('location:index.php');
		
		
	}
}
?>


<!DOCTYPE html>
<html> 
  <head><title>TEMAS</title></head>
    <center>
     <h1><table border='2'><font color="black">Insertar temas</font></table></h1>
<body>
	 <h3><a href="index.php">regresar</a></h3>
	<center>
   	<table border='5' cellspancing='15' width='80%'>
 	 	<form action="temas.php" method="post" name="temas">
  			<tr><td><label>Tema<input name="txttemas" type="text"  id="txtTitulo" value="" ></td></tr>
  			<tr><td><label>Contenido<textarea name="txtcontenido" rows"4" cols="50"></textarea></td></tr>
  			<tr><td><input type="submit" value="Guardar"> </td></tr>
  		</form>
  </center>
  </table>
</body>
</html>	