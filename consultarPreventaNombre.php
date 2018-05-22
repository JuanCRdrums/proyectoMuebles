
<?php
  session_start();
  if(!(isset($_SESSION["usuario"])))
    header("location: index.php");
  
  $SQL = "SELECT * FROM preventa inner join clientes on preventa.CodCliente=clientes.Codigo";
  
    if(isset($_POST["submit"]))
    {
      
      $Nombre = $_POST["Nombre"];
      
      $SQL = "SELECT * FROM preventa inner join clientes on preventa.CodCliente=clientes.Codigo WHERE clientes.Nombre LIKE '%$Nombre%'";
      
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consultar Preventa Nombre</title>
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
            <li><a href="agregarPreventa.php"><dt>Agregar Preventa</dt></a></li>
             <li class="active" class="dropdown">
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
  <h2 style="color:grey">Preventas</h2>
  

      <form class="form-horizontal" role = "form" method = "post" action="consultarPreventaNombre.php">

        <div class="row">
            <div class="col-xs-2">
              <label for = "Nombre" class = "control-label" style="color:white">Nombre del cliente:</label> 
            </div>
            <div class="col-xs-3">
              <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre del cliente"> 
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
          <th style="color:white">Fecha Entrega</th>
          <th style="color:white">Forma de Pago</th>
          <th style="color:white">Seña</th>
          <th style="color:white">Vendedor</th>
          <th style="color:white">Mueble</th>
          <th style="color:white">Color</th>
          <th style="color:white">Valor</th>          
          <th style="color:white">Codigo Cliente</th>
          <th style="color:white">Nombre Cliente</th>
          <th style="color:white">Direccion Cliente</th>
          <th style="color:white">Telefono Cliente</th>
          <th style="color:white">Vendedor</th>

          
        </tr>
      </thead>

      <tbody>
       <?php

          require("conexion.php");
          $idCone = conexion();

          
          $Registro = mysqli_query($idCone,$SQL);
          

          while($Fila = mysqli_fetch_array($Registro))
          {
            echo "<tr class='active'>";
            echo "<td>$Fila[FechaEntrega]";
            echo "<td>$Fila[FormaPago]";
            echo "<td>$Fila[Sena]";
            echo "<td>$Fila[Vendedor]";
            echo "<td>$Fila[Articulo]";
            echo "<td>$Fila[Color]";
            echo "<td>$Fila[ValorMueble]";
            echo "<td>$Fila[CodCliente]";
            echo "<td>$Fila[Nombre]";
            echo "<td>$Fila[Direccion]";
            echo "<td>$Fila[Telefono]";
            echo "<td>$Fila[Vendedor]";
            echo "<td><a href='modificarPreventa.php?Numero=$Fila[Numero]'>Modificar</a>";
            echo "<td><a href='eliminarPreventa.php?Numero=$Fila[Numero]'>Eliminar</a>";   
              
            
          }

         
          mysqli_free_result($Registro);
                   
          
         
          
       
          mysqli_close($idCone);


        ?>
      </tbody>

    </table>
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