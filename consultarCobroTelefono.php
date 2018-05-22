<?php
  session_start();
  if(!(isset($_SESSION["usuario"])))
    header("location: index.php");
  require("conexion.php");
  $idCone = conexion();


  $SQL = "SELECT cobro.Numero, cobro.FechaEntrega, cobro.FormaPago, cobro.Sena, cobro.Vendedor, articulos.Nombre, articulos.Color, articulos.Valor,articulos.Codigo  FROM cobro INNER JOIN articulos ON cobro.CodMueble = articulos.Codigo ORDER BY cobro.Numero";

  $SQL1 = "SELECT clientes.Codigo, clientes.Nombre, clientes.Direccion, clientes.Telefono FROM cobro INNER JOIN clientes ON cobro.CodCliente = clientes.Codigo ORDER BY cobro.Numero";

  if(isset($_POST["submit"]))
    {
      $Telefono = $_POST["Telefono"];

      $SQL = "SELECT cobro.Numero, cobro.FechaEntrega, cobro.FormaPago, cobro.Sena, cobro.Vendedor, articulos.Nombre, articulos.Color, articulos.Valor,articulos.Codigo, cobro.CodCliente, clientes.Codigo  FROM ((cobro INNER JOIN articulos ON cobro.CodMueble = articulos.Codigo) INNER JOIN clientes ON cobro.CodCliente = clientes.Codigo) WHERE (clientes.Telefono LIKE '%$Telefono%') ORDER BY cobro.Numero ";

      $SQL1 = "SELECT clientes.Codigo, clientes.Nombre, clientes.Direccion, clientes.Telefono, cobro.Numero FROM cobro INNER JOIN clientes ON cobro.CodCliente = clientes.Codigo WHERE (clientes.Telefono LIKE '%$Telefono%')  ORDER BY cobro.Numero ";

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consultar Cobro Telefono</title>
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


            <li class="active" class="dropdown">
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
  <h2 style="color:grey">Consultar Cobro</h2>

  <form class="form-horizontal" role = "form" method = "post" action="consultarCobroTelefono.php">

        <div class="row">
            <div class="col-xs-2">
              <label for = "Telefono" class = "control-label" style="color:white">Telefono Cliente:</label> 
            </div>
            <div class="col-xs-3">
              <input class="form-control" type="text" id="Telefono" name="Telefono" placeholder="Telefono de cliente"> 
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
          <th style="color:white">Cobro</th>
          <th style="color:white">Fecha Entrega</th>
          <th style="color:white">Forma de Pago</th>
          <th style="color:white">Seña</th>
          <th style="color:white">Vendedor</th>
          <th style="color:white">Codigo</th>
          <th style="color:white">Mueble</th>
          <th style="color:white">Color</th>
          <th style="color:white">Valor</th>          
          <th style="color:white">Codigo Cliente</th>
          <th style="color:white">Fecha de Abono</th>
          <th style="color:white">Abono</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        
          $Registro = mysqli_query($idCone,$SQL);  
          $Registro1 = mysqli_query($idCone,$SQL1);         
          while($Fila = mysqli_fetch_array($Registro) and $Fila1 = mysqli_fetch_array($Registro1))
          {
            echo "<tr class='active'>";
            echo "<form class='form-inline' action='abonos.php' method='post'>";
            

            echo "<td><input style='width:40px;height:20px' type='text' name='Numero' value='$Fila[Numero]' readonly></td>";
 
            echo "<td>$Fila[FechaEntrega] </td>";

            echo "<td>$Fila[FormaPago]</td>";

            echo "<td><input style='width:50px;height:20px' type='text' name='Sena' value='$Fila[Sena]' readonly></td>";

            echo "<td>$Fila[Vendedor]</td>";

            echo "<td><input style='width:35px;height:20px' type='text' name='CodMueble' value='$Fila[Codigo]' readonly></td>";

            echo "<td>$Fila[Nombre]</td>";

            echo "<td>$Fila[Color]</td>";

            echo "<td><input style='width:60px;height:20px' type='text' name='Valor' value='$Fila[Valor]' readonly></td>";

            echo "<td> <a href=consultarClienteCodigo.php?Codigo=$Fila1[Codigo]> $Fila1[Codigo] </td>";

            
            echo "<td><div class='form-group'>";
            echo "<input style='width:145px;height:20px' type='date' name='FechaAbono' placeholder='fecha de abono'>";
            echo "<td>";
            echo "<input style='width:90px;height:20px' type='number' name='Abono' placeholder='Abono'>";
            echo "<td>";
            echo "</div>";
            echo "<td>";
            echo "<div class='form-group'>";
            echo "<input type='submit' class='btn btn-primary' value='Guardar' name='submit2'>";
            echo "</div>";
            echo "</form>";
                        
          }
          mysqli_free_result($Registro);

          mysqli_free_result($Registro1);
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
            