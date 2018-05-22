<?php
    session_start();
    if(!(isset($_SESSION["usuario"])))
      header("location: index.php");
    $mensaje = "";
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $ValorMueble = $_POST["ValorMueble"];
      $FechaEntrega = $_POST["FechaEntrega"];
      $Color = $_POST["Color"];
      $Articulo = $_POST["Articulo"];
      $CodCliente = $_POST["CodCliente"];
      $Sena = $_POST["Sena"];
      $FormaPago = $_POST["FormaPago"];
      $Vendedor = $_POST["Vendedor"];

      $SQL2 = "SELECT * FROM clientes WHERE Codigo LIKE '$CodCliente' ";
      $Registro2 = mysqli_query($idCone,$SQL2);
      $Fila2 = mysqli_fetch_array($Registro2);
      if(sizeof($Fila2)>0)
      {
        $SQL = "INSERT INTO preventa(ValorMueble,FechaEntrega,Color,Articulo,CodCliente,Sena,FormaPago,Vendedor) VALUES('$ValorMueble','$FechaEntrega','$Color','$Articulo','$CodCliente','$Sena','$FormaPago','$Vendedor')";
        if(mysqli_query($idCone,$SQL))
        {
          $mensaje = "Preventa ingresada con exito";
        }
        else
        {
          $mensaje = "Error ingresando la preventa";
        }

      }
      else
      {
        $mensaje = "Codigo del cliente no encontrado";
      }
       
    }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar Preventa</title>
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
            <li class="active"><a href="agregarPreventa.php"><dt>Agregar Preventa</dt></a></li>
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

  	  <h2 style="color:grey">Agregar Preventa</h2>  
    

      <form class="form-horizontal" role = "form" method = "post" action="agregarPreventa.php">

      <div class="form-group row">
          <div class="col-xs-2">
            <label for = "Articulo" class = "control-label" style="color:white">Nombre del artículo:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="Articulo" placeholder="Articulo" name="Articulo" required>
          </div>
          <div class="col-xs-2"> 
            <label for = "Color" class = "control-label" style="color:white">Color:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="text" id="Color" placeholder="Color" name="Color" required>
          </div>
      </div>
      <br>
      <div class="form-group row">
          <div class="col-xs-2">
            <label for = "CodCliente" class = "control-label" style="color:white">Codigo del cliente:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="number" id="CodCliente" name="CodCliente" placeholder="Codigo del cliente" required> 
          </div>
          <div class="col-xs-2"> 
            <label for = "Sena" class = "control-label" style="color:white">Seña:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="text" id="Sena" placeholder="Seña" name="Sena" required>
          </div>
      </div>
      <br>
      <div class="form-group row">
          <div class="col-xs-2">
            <label for = "FechaEntrega" class = "control-label" style="color:white">Fecha de Entrega:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="date" id="FechaEntrega" name="FechaEntrega" placeholder="Fecha de entrega" required> 
          </div>
          <div class="col-xs-2"> 
            <label for = "ValorMueble" class = "control-label" style="color:white">Valor del Mueble:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="number" id="ValorMueble" placeholder="Valor del mueble" name="ValorMueble" required>
          </div>
      </div>
      <br>
      <div class="form-group row">
          <div class="col-xs-2">
            <label for = "FormaPago" class = "control-label" style="color:white">Forma de pago:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="FormaPago" name="FormaPago" placeholder="Forma de pago" required> 
          </div>
          <div class="col-xs-2"> 
            <label for = "Vendedor" class = "control-label" style="color:white">Vendedor:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="text" id="Vendedor" placeholder="Vendedor" name="Vendedor" required>
          </div>
      </div>
      <br>
      <div class = "row">
        <div class="col-xs-12" align="center">
          <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Guardar">
        </div>
      </div>

      <div class="form-group">
       <div class="col-sm-10 col-sm-offset-2">
        <h5 style="color:white">
        <?php echo $mensaje; ?>
        </h5>  
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