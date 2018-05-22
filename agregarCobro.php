<?php
    session_start();
    if(!(isset($_SESSION["usuario"])))
      header("location: index.php");
    $mensaje = "";
    $mensaje1 = "";
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $FechaEntrega = $_POST["FechaEntrega"];
      $Articulo = $_POST["Articulo"];
      $Color = $_POST["Color"];
      $NumeroDocumento = $_POST["NumeroDocumento"];
      $Sena = $_POST["Sena"];
      $Vendedor = $_POST["Vendedor"];
      $FormaPago = $_POST["FormaPago"];

      $SQLarticulosingresados = "SELECT * FROM articulos WHERE (Nombre LIKE '%$Articulo%') AND (Color LIKE '%$Color%')";
      $articulosingresados = mysqli_query($idCone, $SQLarticulosingresados);
      $validaArticulo = FALSE;
      
      $cont = 0;
      while($Fila = mysqli_fetch_array($articulosingresados))
      {
        $cont = $cont + 1;
        $CodMueble = $Fila["Codigo"];
      }
      if ($cont > 0)
      {
        $validaArticulo = TRUE;
      }
      else
      {
        $mensaje1="El articulo no existe en la base de Datos";
      }
      mysqli_free_result($articulosingresados);

      $SQLcodigoingresado = "SELECT Codigo FROM clientes";
      $codigoingresado = mysqli_query($idCone, $SQLcodigoingresado);
      $validaCodigo = FALSE;
      while($F = mysqli_fetch_array($codigoingresado))
      {
        if ($NumeroDocumento == $F["Codigo"])
        {
          $validaCodigo = TRUE;
        }
        
      }
      mysqli_free_result($codigoingresado);

      $SQLcant = "SELECT Nombre, Cantidad, Color  FROM articulos WHERE (Nombre LIKE '%$Articulo%') AND (Color LIKE '%$Color%')";
      $cant = mysqli_query($idCone, $SQLcant);
      while($F = mysqli_fetch_array($cant))
      {
        if ( ($validaArticulo == TRUE) and ($validaCodigo == TRUE) )
        {
          $cantidad = $F["Cantidad"] - 1;
        }
        
        
      }
      mysqli_free_result($cant);


      if( ($validaCodigo == TRUE) AND ($validaArticulo == TRUE) )
      {
        $SQL = "UPDATE articulos SET cantidad = $cantidad WHERE (Codigo LIKE '$CodMueble')";
        $SQL1 = "INSERT INTO cobro(FechaEntrega,FormaPago,Sena,CodCliente,Vendedor,CodMueble) VALUES('$FechaEntrega','$FormaPago','$Sena','$NumeroDocumento','$Vendedor','$CodMueble')";
      }
      else
      {
        $SQL = "0";
        $SQL1 = "1";
        $mensaje1 = "Recuerde ingresar el cliente y/o el articulo en la base de datos antes de realizar un cobro";
      }
      
      
      if((mysqli_query($idCone,$SQL)) and (mysqli_query($idCone,$SQL1)))
      {
        $mensaje = "Cobro ingresado con exito";
      }
      else
      {
        $mensaje = "Error ingresando el cobro "  ;
      }   
      
    }
      
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar Cobro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            <li><a href="editarStock.php "><dt>Editar Stock</dt></a></li>
            <li><a href="consultarStock.php"><dt>Consultar Stock</dt></a></li>
            <li class="active"><a href="agregarCobro.php"><dt>Agregar Cobro</dt></a></li>


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


  <br>
      <div class='container'>
      <h2 style="color:grey">Agregar Cobro</h2>  


      <form class="form-horizontal" role = "form" method = "post" action="agregarCobro.php">

               
        
      <div class="row">
        <div class="col-xs-2"> 
          <label for = "FechaEntrega" class = "control-label" style="color:white">Fecha de Entrega:</label>   
        </div>
      <div class="col-xs-3">
        <input class="form-control" type="date" id="FechaEntrega" name="FechaEntrega" required>
      </div>
      </div>  
      <br>
      <div class="row">
          <div class="col-xs-2">
            <label for = "Articulo" class = "control-label" style="color:white">Articulo:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="Articulo" name="Articulo" placeholder="Articulo" required> 
          </div>

          <div class="col-xs-2"> 
            <label for = "Color" class = "control-label" style="color:white">Color:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="text" id="Color" placeholder="Color" name="Color" required>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2">
          <label for = "NumeroDocumento" class = "control-label" style="color:white">ID Cliente:</label> 
        </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="NumeroDocumento" name="NumeroDocumento" placeholder="NumeroDocumento" required>
          </div>
        <div class="col-xs-2">
          <label for = "Sena" class = "control-label" style="color:white">Seña:</label> 
        </div>
      <div class="col-xs-3">
        <input class="form-control" type="number" id="Sena" name="Sena" placeholder="Seña" required> 
      </div>
      </div>

      <br>
      <div class="row">
        <div class="col-xs-2">
          <label for = "Vendedor" class = "control-label" style="color:white">Vendedor:</label> 
        </div>
      <div class="col-xs-3">
        <input class="form-control" type="text" id="Vendedor" name="Vendedor" placeholder="Vendedor" required> 
      </div>
        <div class="col-xs-2"> 
          <label for = "FormaPago" class = "control-label" style="color:white">Forma de Pago:</label>   
        </div>
      <div class="col-xs-3">
        <input class="form-control" type="text" id="FormaPago" placeholder="Forma de Pago" name="FormaPago" required>
      </div>
      </div>
      <br><br>
      <div class = "row">
        <div class="col-xs-12" align="center">
          <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Guardar">
        </div>
      </div>

      <div class="form-group">
       <div class="col-sm-10 col-sm-offset-2">
          <h5 style="color:white">

          <?php 
          echo $mensaje;
          echo "<br>";
          ?></h5>

          <?php echo $mensaje1; 
          ?> 
           
        </div>
      </div>

    </form>

<script src="js/jquery-3.2.1.min.js"></script>
    <script type="js/bootstrap.min.js"></script>

    <script>
    (function() {
      'use strict';

      window.addEventListener('load', function() {
        var form = document.getElementById('needs-validation');
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      }, false);
    })();
    </script>
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