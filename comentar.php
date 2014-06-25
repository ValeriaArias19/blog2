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
  <head>
    <head>
    <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
    <title>COMENTAR</title>
  </head>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
</body>
</html>