<?php
$mensaje = "";

if(isset($_POST['txttema']))
{
  
  $id_tema = $_POST["txttema"];
  $comentarios = $_POST["txtcomentario"];

    
  if(strlen($id_tema)==0 OR strlen($comentarios)==0)
    $mensaje = "Debe poner datos!!!";
  else
  {
    include_once("settings/settings.inc.php");

    $conexion= mysql_connect (SQL_HOST,SQL_USER,SQL_PWD);
    $db=mysql_select_db(SQL_DB,$conexion) or die (MySQL_error());
    $sql_tema = "INSERT into comentarios(id_tema , comentario) values ('$id_tema', '$comentarios')"; 
    $rs_tema = mysql_query($sql_tema, $conexion) or die(mysql_error());
        header("location:index.php?error=4");
  }
}
?>

<!DOCTYPE html>
<html> 
  <head><title>COMENTAR</title></head>
    <center>
     <h1><table cellspancing='15'></table></h1>
<body>
	 <h3><a href="index.php">regresar</a></h3>
	<center>
   	<table border='5' cellspancing='15' width='80%'>
 	 	<form action="comentar.php" method="post" name="comentar">
        <tr><td><label><h3>Id tema</h3><input name="txtidtema" type="text"  id="txtid_tema" value="" ></td></tr>
  			<tr><td><label><h3>Comentar</h3><textarea name="txtcomentario" rows="5" cols="100"></textarea></td></tr>
  			<tr><td><input type="submit" value="Guardar"> </td></tr>
  		</form>
  </center>
  </table>
</body>
</html>