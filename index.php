  <?php
  	session_start();
  	session_unset();
  	session_destroy();
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $Usuario = $_POST["usuario"];
      $Clave = $_POST["clave"];
      $SQL = "SELECT * FROM usuarios WHERE (usuario LIKE '$Usuario') and (clave LIKE '$Clave')";
      $exito = False;
      $registro = mysqli_query($idCone,$SQL);
      $cont = 0;
      while($Fila = mysqli_fetch_array($registro))
      {
        $cont++;
        $Empresa = $Fila["empresa"];
      }
      if($cont > 0)
      {
        header('Location: inicio.php');
        session_start();
        $_SESSION["usuario"] = $Usuario;
        $_SESSION["empresa"] = $Empresa;
      }
      else
      {
        header('Location: index.php?mensaje=ERROR: Nombre de usuario y/o contraseña incorrecto');
      }
    #mysqli_close($idCone);
    }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Iniciar sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
	<body background="fondo.jpg">
	<div class="container">

		<br><br><br><br>
		<h1 align="center" style="color:white">Iniciar sesión</h1>

		<br><br><br><br>

		<div class="col-xs-3"></div>

		<div class="col-xs-6">

		<form action="index.php" method="post">
		  <div class="form-group">
		    <label for="usuario" style="color:white">Nombre de usuario:</label>
		    <input type="text" class="form-control" id="usuario" name="usuario" size="20">
		  </div>
		  <div class="form-group">
		    <label for="clave" style="color:white">Contraseña:</label>
		    <input type="password" class="form-control" id="clave" name="clave" size="10">
		  </div>
		  <input type="submit" class="btn btn-default" name="submit" value="Ingresar">
		</form>
		</div>
	</div>
		<?php
			if (isset($_REQUEST["mensaje"]))
			{
				$mensaje = $_REQUEST["mensaje"];
				echo "<p style='color:red' align='center'>$mensaje</p>";
			}
		?>
</body>
</html>