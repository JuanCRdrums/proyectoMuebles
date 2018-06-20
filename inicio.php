
<?php
  session_start();
  if(!(isset($_SESSION["usuario"])))
    header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="apple-touch-icon" href="http://example.com/images/apple-touch-icon.png" />

  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

 
<body background="fondo.jpg" >


  <div class='container'>
    <br>
      <h1 align="center" style="color:white" font-face="Bombard_">C R E D I M U E B L E S</h1>
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
      <li class="active"><a href="inicio.php"><dt>Inicio</dt></a></li>
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

  
  	 
      <?php
        echo "<h2 style='color:white'>Bienvenido, $_SESSION[usuario]</h2>";
      ?>
      <h2 style="color:grey">¿Qué desea hacer? </h2> 

      <table>
      

        <tr>
          <th><a href="agregarArticulo.php"><font style="color:white" size="4">Agregar artículo</font></a></th>
        </tr>
        <tr>
          <th><a href="editarStock.php "><font style="color:white" size="4">Editar stock</font></a></th>
        </tr>
        <tr>  
          <th><a href="consultarStock.php"><font style="color:white" size="4">Consultar stock</font></a></th>
        </tr>
        <tr>  
          <th><a href="agregarCobro.php"><font style="color:white"size="4">Agregar cobro</font></a></th>
        </tr>
        <tr>  
          <th><a href="consultarCobroCodigo.php"><font style="color:white" size="4">Consultar cobro</font></a></th>
        </tr>
        <tr>  
          <th style="color:white"><a href="consultarAbonos.php"><font style="color:white" size="4">Consultar Abonos</font></a></th>
        </tr>
        <tr>  
          <th><a href="agregarPreventa.php"><font style="color:white" size="4">Agregar preventa</font></a></th>
        </tr>
        <tr>  
          <th><a href="consultarPreventaCodigo.php"><font style="color:white" size="4">Consultar preventa</font></a></th>
        </tr>
        <tr>  
          <th><a href="agregarCliente.php"><font style="color:white" size="4">Agregar cliente</font></a></th>
        </tr>
        <tr>  
          <th><a href="consultarClienteCodigo.php"><font style="color:white" size="4">Consultar Cliente</font></a></th>
        </tr>
        <tr>  
          <th><a href="cuentasTerminadas.php"><font style="color:white" size="4">Cuentas Terminadas</font></a></th>
        </tr>
        <tr>  
          <th><a href="dineroCobrador.php"><font style="color:white" size="4">Cobrador</font></a></th>
        </tr>
        <tr>  
          <th><a href="deudoresMorososCodigo.php"><font style="color:white" size="4">Deudores Morosos</font></a></th>
        </tr>
    

    </table>
      
     

	   </div>
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