<?php
  $mensaje = " ";
  if (isset($_GET["error"])) 
  {
  	$error =$_GET ["error"];
  	if ($error <> "")
  	{
  		switch ($error) 
  		{
  			case '1':
  			   echo "El usuario no existe";
  				break; 
  			case '2':
  			   echo "La contrasena no existe";
  				break;	
  			case '3':
  			   echo "Debe logearse para poder entrar";
  				break;	
  			case '4':
  			   	echo "Se ha registrado, gracias. Ahora entre";
  				break;		
  		}
  	}
  } 
  else 
  {
  	$error ="";
  }
?>

<!doctype html>
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
</head>
	<body> 
	  <center>
		<form action="validarlogin.php" method="post" name="login">
		<center>
          <h1><font>Bienvenido.</font></h1>
        </center>
		   
			<TABLE BORDER="5" bordercolor="#FFFFFF" CELLSPACING="15" WIDTH="150">   
				<tr> 
					<td>
						<b>
							<center>
								<h2>Usuario</h2>
								<input name="txtusuario" id="txtusuario" value="" type="text">
							</center>
						</b>
					</td>
				</tr>
				<tr> 
					<td>
						<b>
							<center>
								<h2>Password</h2>
								<input type="password" name="txtpass" id="txtpass" value="" id="Password">
							</center>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							<input type="submit" name="Entrar"><right> <a href="registro.php">ingresar</a>
						</center>
					</td>
				</tr>
			</table>
		</form>
		</center>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>