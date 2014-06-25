<?php
$usuario = $_POST["txtusuario"];
$password = $_POST["txtpass"];

include_once("settings/settings.inc.php");

$conexion= mysql_connect (SQL_HOST,SQL_USER,SQL_PWD);
$db=mysql_select_db(SQL_DB,$conexion) or die (MySQL_error());
$sql_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$rs_usuario = mysql_query($sql_usuario, $conexion) or die(mysql_error());

$total_usuario= mysql_num_rows($rs_usuario);
if($total_usuario==1) {
	$row_usuario = mysql_fetch_array($rs_usuario);
	if($row_usuario["password"] == $password) {
		session_start();
		$t = getdate();
		$fecha = date("Y-m-d" , $t[0]);
		$_SESSION["idusr"] = $row_usuario["id"];
		$_SESSION["usuario"] = $row_usuario["usuario"];
		$_SESSION["nombre"] = $row_usuario ["nombre"];
		$_SESSION["tipo"] = $row_usuario ["tipo"];
		$_SESSION["fecha"] = $fecha;

		header("location:index.php");

	} else { 
		header("location:login.php?error=2");
	}
}
else {
	header("location:login.php?error=1"); 
}
?>