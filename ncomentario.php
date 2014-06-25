<?php
	include_once("settings/settings.inc.php");
	$conexion=@mysql_connect(SQL_HOST, SQL_USER, SQL_PWD);
	$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());

	//asi elimino un comentario

	if (isset($_GET['eliminar'])) {
		$sql="DELETE FROM comentarios WHERE id='".$_GET['eliminar']."'";
		$DELETE=mysql_query($sql, $conexion);
		header("location:index.php");
	}


	if (isset($_POST['contenido'])) {
		session_start();
		$temaid=$_POST['idtema'];
		if (isset($_SESSION["idusr"])) {
			if (isset($_POST['iddecomentario'])) {
				if ($_POST['iddecomentario']>0) {
					$update="UPDATE comentarios SET comentario='".$_POST['contenido']."' WHERE id='".$_POST['iddecomentario']."';";
					$editarcomentario=mysql_query($update, $conexion) or die (mysql_error());
					header("location:index.php");
				}
			}
			if ($temaid>0) {
				$comentario = $_POST['contenido']; 
				$sql="INSERT INTO comentarios (id_usuario, id_tema, comentario) VALUES ('".$_SESSION["idusr"]."', '".$_POST['idtema']."', '".$comentario."');";
				$comentarionuevo=mysql_query($sql, $conexion);
				header("location:index.php");
			}
			else
				header("location:index.php");
		}
		else
			header("location:login.php");			
	}
	//Editar un Cometario
	if (isset($_GET['idcomentario'])) {
		$idcoment=$_GET['idcomentario'];
		$conexion=@mysql_connect(SQL_HOST, SQL_USER, SQL_PWD);
		@mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
		$sql_editar= "SELECT * FROM comentarios where id='".$idcoment."';";
		$recordset1= mysql_query($sql_editar, $conexion) or die (mysql_error());
		$recordset= mysql_fetch_array($recordset1);
		$contenido=$recordset['comentario'];
		$iddecomentario=$recordset['id'];
	}
	else {
		$contenido="";
		$iddecomentario=0;
	}
 ?>
<!DOCTYPE HTML>
<META CHARSET="UTF-8">
<html>
		<form action="ncomentario.php" method="POST" name="comentario">
				<tr><td>Añade un nuevo comentario</td></tr><br>
				<tr><td><input type="hidden" name="iddecomentario" value="<?php echo $iddecomentario; ?>"></td></tr>
				<tr><td><input type="hidden" name="idtema" value="<?php echo $_GET['ncomentario']; ?>"></td></tr>
				<tr><td><textarea name="contenido" id="contenido" cols="70" rows="3" placeholder="Presiona para insertar tu texto o contenido"><?php echo $contenido; ?></textarea></td></tr>
				<tr><td align="center"><input type="submit" value="Comentar"></td></tr>
			</table>
		</form>
	</body>
</html>
<form action="">
