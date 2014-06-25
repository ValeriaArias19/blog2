<?php

include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());

// Actualiza tipo de usuario
if (isset($_GET['idusr'])) {
	$idusr = $_GET['idusr'];
	$tipo = $_GET['tipo'];

	$sql1 = "UPDATE usuarios SET tipo=$tipo WHERE id=$idusr";  
	$usuarios   = @mysql_query($sql1, $conexion);
}

// Borrar usuarios
if (isset($_GET['delidus'])) {
	$idus = $_GET['delidus'];

	$sql1 = "DELETE from usuarios Where id = $idus";  
	$usuarios   = @mysql_query($sql1, $conexion);
}

// Todos los usuarios
$sql      = "select id, nombre from usuarios";
$usuarios   = @mysql_query($sql, $conexion);

?>

<!doctype html>
<html>  
	<body> 
	  <center>
		<form action="validarlogin.php" method="post" name="login">
		<center>
          <h1><font color="black">CAMBIO DE USUARIO</font></h1>
        </center>
		<TABLE BORDER="0" CELLSPACING="18" WIDTH="150">  
          <?php
            while($usuario = @mysql_fetch_array($usuarios))
            {
            echo"<tr>";
             	echo "<td><b><center>".$usuario['nombre']."</center></b></td>";
             	echo "<td><center><a href='usuarios.php?idusr=".$usuario['id']."&tipo=1'>Administrador</a></center></td>";
             	echo "<td><center><a href='usuarios.php?idusr=".$usuario['id']."&tipo=2'>Editor</a></center></td>";
             	echo "<td><center><a href='usuarios.php?idusr=".$usuario['id']."&tipo=3'>Usuario</a></center></td>";
             	echo "<td><center><a href='usuarios.php?delidus=".$usuario['id']."'>Borrar</a></center></td>";
	   		echo"</tr>";
	   	    } 
	   	  ?>
		
		</center>
		<center>
		 <a href="index.php">Regresar</a>
		</center>
		</table>
		</form>
	  </center>
	</body>
</html>

