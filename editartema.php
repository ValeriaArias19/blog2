<?php
	include_once("settings/settings.inc.php");
	$conexion=@mysql_connect(SQL_HOST, SQL_USER, SQL_PWD);
	$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());

if (isset($_POST['contenido'])) {
		session_start();
		$temaid=$_POST['idtema'];
		if (isset($_SESSION["idusr"])) {
			if (isset($_POST['iddecomentario'])) {
				if ($_POST['iddecomentario']>0) {
					$update="UPDATE temas SET tema='".$_POST['contenido']."' WHERE id='".$_POST['iddecomentario']."';";
					$editartema=mysql_query($update, $conexion) or die (mysql_error());
					header("location:index.php");
				}
			}
			if ($temaid>0) {
				$tema = $_POST['contenido']; 
				$sql="INSERT INTO temas (id_usuario, titulo, comentario) VALUES ('".$_SESSION["idusr"]."', '".$_POST['idtema']."', '".$temas."');";
				$temanuevo=mysql_query($sql, $conexion);
				header("location:index.php");
			}
			else
				header("location:index.php");
		}
		else
			header("location:login.php");			
	}
	//Editar un Cometario
	if (isset($_GET['idtema'])) {
		$idtem=$_GET['idtema'];
		$conexion=@mysql_connect(SQL_HOST, SQL_USER, SQL_PWD);
		@mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
		$sql_editar= "SELECT * FROM temas where id='".$idtem."';";
		$recordset1= mysql_query($sql_editar, $conexion) or die (mysql_error());
		$recordset= mysql_fetch_array($recordset1);
		$contenido=$recordset['tema'];
		$iddetema=$recordset['id'];
	}
	else {
		$contenido="";
		$iddetema=0;
	}
 ?>
<!DOCTYPE HTML>
<META CHARSET="UTF-8">
<html>
  <head><title>EDITAR TEMAS</title></head>
    <center>
     <h1><table></table></h1>
<body>
	 <h3><a href="index.php">regresar</a></h3>
 		<form action="editartema.php" method="post" name="temas">
  			<tr><td><input type="hidden" value=".EL_GET_DE_EDIARTEMA."><label>Tema<input name="txttemas"  type="text"  id="txtTitulo" value="" ></td></tr>
  			<tr><td><label>Contenido<textarea name="txtcontenido"></textarea></td></tr>
  			<tr><td><input type="submit" value="Guardar"> </td></tr>
  		</form>
  </center>
  </table>
</body>
</html>	