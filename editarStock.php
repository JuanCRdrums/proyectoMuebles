<?php
  session_start();
  if(!(isset($_SESSION["usuario"])))
    header("location: index.php");
  $Empresa = $_SESSION["empresa"];
  $SQL1 = "SELECT * FROM articulos WHERE (empresa LIKE '$Empresa')";
  $SQL2 = "";
  $mensaje = "";
  require("conexion.php");
  $idCone = conexion();
    if(isset($_POST["submit"]))
    {
      $Nombre = $_POST["Nombre"];
      $Color = $_POST["Color"];
      if($Color != "" and $Nombre != "")
      {
        $SQL1 = "SELECT * FROM articulos WHERE (nombre LIKE '%$Nombre%') AND (color LIKE '%$Color%') AND (empresa LIKE '$Empresa')";
      }
      else
      {
        if($Nombre == "")
        {
          $SQL1 = "SELECT * FROM articulos WHERE (color LIKE '%$Color%') AND (empresa LIKE '$Empresa')";
        }
        else
        {
          $SQL1 = "SELECT * FROM articulos WHERE (nombre LIKE '%$Nombre%') AND (empresa LIKE '$Empresa')";
        }
      }
    }
    if(isset($_POST["submit2"]))
    {
      $Cantidad = $_POST["Cantidad"];
      $Nombre = $_POST["Nombre"];
      $Color = $_POST["Color"];
      $Valor = $_REQUEST["Valor"];


      $SQL2 = "UPDATE articulos SET cantidad='$Cantidad' WHERE (nombre LIKE '$Nombre') AND (color LIKE '$Color') AND (valor LIKE '$Valor') AND (empresa LIKE '$Empresa')";
      if(mysqli_query($idCone,$SQL2))
      {
        $mensaje = "Artículo editado con éxito";
      }
      else
      {
        $mensaje = "Error editando artículo";
      }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editar Stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body background="fondo.jpg">
  <div class='container'>
    <br>
      <h1 align="center" style="color:white">C R E D I M U E B L E S</h1>
      <br>
      <div class="row">
        <div class="col-xs-9">
        </div>
        <div class="col-xs-3">
          <?php
            echo "<p style='color:white'>$_SESSION[usuario] <a href='index.php' class='btn btn-info btn-lg'><span class='glyphicon glyphicon-log-out'></span> Cerrar sesión </a></p>";
          ?>

        </div>
      </div>

<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <ul class="nav navbar-nav" >
      <li><a href="inicio.php"><dt>Inicio</dt></a></li>
            <li><a href="agregarArticulo.php"><dt>Agregar Artículo</dt></a></li>
            <li class="active"><a href="editarStock.php "><dt>Editar Stock</dt></a></li>
            <li><a href="consultarStock.php"><dt>Consultar Stock</dt></a></li>
            <li><a href="agregarCobro.php"><dt>Agregar Cobro</dt></a></li>


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar Cobro<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="consultarCobroCodigo.php"><dd>Número de cobro</dd></a></li>
                  <li><a href="consultarCobroNombre.php"><dd>Nombre</dd></a></li>
                  <li><a href="consultarCobroDireccion.php"><dd>Dirección</dd></a></li>   
                  <li><a href="consultarCobroTelefono.php"><dd>Teléfono</dd></a></li>   
                  <li><a href="consultarCobroVendedor.php"><dd>Vendedor</dd></a></li>                  
                </ul>
            </li>

            <li><a href="consultarAbonos.php"><dt>Consultar Abonos</dt></a></li>
            <li><a href="agregarPreventa.php"><dt>Agregar Preventa</dt></a></li>
             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar Preventa<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="consultarPreventaCodigo.php">ID Cliente</a></li>
                  <li><a href="consultarPreventaNombre.php">Nombre</a></li>
                  <li><a href="consultarPreventaDireccion.php">Dirección</a></li>   
                  <li><a href="consultarPreventaTelefono.php">Teléfono</a></li>   
                  <li><a href="consultarPreventaVendedor.php">Vendedor</a></li>                  
                </ul>
            </li>
            <li><a href="agregarCliente.php"><dt>Agregar Cliente</dt></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultar Cliente<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="consultarClienteCodigo.php">ID Cliente</a></li>
                  <li><a href="consultarClienteNombre.php">Nombre</a></li>
                  <li><a href="consultarClienteDireccion.php">Dirección</a></li>   
                  <li><a href="consultarClienteTelefono.php">Teléfono</a></li> 
                </ul>
            </li>
            <li><a href="cuentasTerminadas.php"><dt>Cuentas Terminadas</dt></a></li>
            <li><a href="dineroCobrador.php"><dt>Cobrador</dt></a></li>
            <li  class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Deudores Morosos<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="deudoresMorososCodigo.php">ID Cliente</a></li>
                  <li><a href="deudoresMorososNombre.php">Nombre</a></li>
                  <li><a href="deudoresMorososDireccion.php">Dirección</a></li>   
                  <li><a href="deudoresMorososTelefono.php">Teléfono</a></li>                     
                </ul>
            </li>      
        </ul>    
    
  </div>
</nav> 
  <br><br>

  <h2 style="color:grey">Editar Stock</h2>
  <p style="color:white">Ingrese nombre y/o color a editar</p>

      <form class="form-horizontal" role = "form" method = "post" action="editarStock.php">

        <div class="row">
            <div class="col-xs-2">
              <label for = "Nombre" class = "control-label" style="color:white">Nombre:</label> 
            </div>
            <div class="col-xs-3">
              <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre del artículo"> 
            </div>
            <div class="col-xs-2"> 
              <label for = "Color" class = "control-label" style="color:white">Color:</label>   
            </div>
            <div class="col-xs-3">
               <input class="form-control" type="text" id="Color" placeholder="Color" name="Color">
            </div>
        </div>
        <br>
        <div class = "row">
          <div class="col-xs-6" align="center">
            <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Buscar">
          </div>
        </div>
      </form>


    <table class = "table table-condensed">
      <thead>

        <tr>
          <th style="color:white">Nombre</th>
          <th style="color:white">Color</th>
          <th style="color:white">Valor unitario</th>
          <th style="color:white">Cantidad</th>
        </tr>
      </thead>

      <tbody>
        <?php
          $Registro = mysqli_query($idCone,$SQL1);
          while($Fila = mysqli_fetch_array($Registro))
          {
            echo "<tr class='active'>";
            echo "<td>";
            echo "<form class='form-inline' action='editarStock.php?Valor=$Fila[Valor]' method='post'>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='Nombre' value='$Fila[Nombre]' readonly>";
            echo "<td>";
            echo "<input type='text' name='Color' value='$Fila[Color]' readonly>";
            echo "<td>$$Fila[Valor]";
            echo "<td>";
            echo "<div class='form-group'>";
            echo "<input type='number' value='$Fila[Cantidad]' name='Cantidad'>";
            echo "</div>";
            echo "<td><a href='eliminarStock.php?Numero=$Fila[Codigo]'>Eliminar</a>";
            echo "<td>";
            echo "<div class='form-group'>";
            echo "<input type='submit' class='btn btn-primary' value='Guardar' name='submit2'>";
            echo "</div>";
            echo "</form>";

          }
          mysqli_free_result($Registro);
          mysqli_close($idCone);
        ?>
      </div>
      </tbody>
    </table>
    <br>
    <h5 style="color:white">
    <?php echo $mensaje; ?> 
  </div>


<br><br>
<div class="row">
  <div class="col-sm-10 "></div>
  <div class="col-sm-2">
    <button type="button" onclick='window.print();' value='Imprimir' class="btn btn-info">Imprimir</button>
  </div>
</div>

</body>
</html>