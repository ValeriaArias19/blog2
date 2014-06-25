<?php
session_start();

if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
  $tipo    = $_SESSION['tipo'];
  $fecha   = $_SESSION["fecha"];
  $nombre  = $_SESSION["nombre"];
}
else
{
  $usuario = "";
  $tipo    = 0;
  $fecha   = ""; 
  $nombre  = "" ;
}

?>

<!DOCTYPE html>
<html>
    <?php if ($tipo>=1) { ?> 
    <a href="login.php">Cerrar Sesion</a>| <a href=" registro.php ">Registrar</a> | <a href=" login.php ">Entrar</a> <?php } ?>
    <?php if ($tipo==0) { ?> 
     <a href="login.php">Cerrar Sesion</a> 
    <?php } ?>
     <?php if ($tipo==1) { ?> 
      | <a href=" usuarios.php ">Panel De Usuarios</a>
    <?php } ?>
<?php

include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql="select temas.*,  usuarios.nombre from temas, usuarios where temas.id_usuario = usuarios.id order by fecha_pub desc; ";
$temas    = @mysql_query($sql, $conexion);

if (isset($_SESSION["nombre"])) {
  echo $_SESSION["nombre"];
}

//Eliminar temas
  if (isset($_GET['delidtemas'])) {
  	$idtema = $_GET['delidtemas'];
  	$sql1 = "DELETE from temas Where id = '".$idtema."'";  
  	$temas=@mysql_query($sql1, $conexion);
    header('location:index.php');
  }
  

?>
<!DOCTYPE HTML>
 <META CHARSET="UTF-8">
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
    <title>Blog</title>
  </head>
    <center>
     <h1>Animales en peligro de extincion</h1>
    </center>
    <?php
    echo"<tr>";
    echo"<h3><a href='temas.php'>Tema nuevo</a></h3>";
    if($tipo==1){
    echo"</tr>";
    }
    ?>
  </html> 
 <body>
 <center>
   <table border='5' cellspancing='15' width='80%'>
<?php
   while($tema = @mysql_fetch_array($temas))
   {
   echo "<tr>";
    echo "<td>","<h1>","<center>".$tema['titulo']."</center>","</h1>","</td>";
    if ($tipo == 1) {
      ?>
      //este es el codigo 
        <td><center><button type="button" class="btn btn-warning" onclick="window.location.href='ncomentario.php?ncomentario='<?php echo $tema['id']; ?>'">comentar</button>
      echo "<td><center><h3><a href='ncomentario.php?ncomentario=".$tema['id']."''>comentar</a></h3></center></td>";
      echo "<td><center><h3><a href='editartema.php?editartema=".$tema['id']."'>editar</a></h3></center></td>";
      echo "<td><center><a href='index.php?delidtemas=".$tema['id']."'>Eliminar</a></center></td>";
   echo "</tr>";
    }

   echo "<tr>";
     echo "<td colspan='4'>","<h3>".$tema['nombre']." - ".$tema['fecha_pub']."</h1>","</td>";    
   echo "</tr>";

   echo "<tr>";
     echo "<td colspan='4'>","<h3>".$tema['contenido']."</h3>","</td>"; 
         if ($tipo==0) {
   echo "</tr>";
      
      echo"<tr>";
     echo "<td><center><h3><a href='ncomentario.php?ncomentario=".$tema['id']."''>comentar</a></h3></center></td>"; 
      }
    echo"</tr>";

     $sql1 = "select comentarios.*, usuarios.nombre from comentarios, usuarios, temas " .
          "where comentarios.id_usuario = usuarios.id and comentarios.id_tema = temas.id " .
          "and comentarios.id_tema = " . $tema['id'];
     $comentarios = @mysql_query($sql1, $conexion);

     while($comentario = @mysql_fetch_array($comentarios))
     {

      echo "<tr>";
       echo "<td colspan='3'>".$comentario['comentario']."</td>"; 
       if($tipo==1 or $tipo==2){
       echo "<td><font color='black'>".$comentario['nombre']."<a href='ncomentario.php?idcomentario=".$comentario['id']."'>Editar</a><a href='ncomentario.php?eliminar=".$comentario['id']."'>Eliminar</a>
<button>like</button></td>";

      echo "</tr>";
       }
     }
    }
@mysql_close($conexion);
?>   
  </table>
 </center>
 <center>
  <img src="gracias.gif ">
  <h1><a href="login.php">Close</a></h1>
 </center>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
 </body>
<html>
