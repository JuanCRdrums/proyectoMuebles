<?php
    session_start();
    if(!(isset($_SESSION["usuario"])))
      header("location: index.php");
    $mensaje = "";
    $Empresa = $_SESSION["empresa"];
    if(isset($_POST["submit"]))
    {
      require("conexion.php");
      $idCone = conexion();
      $Codigo = $_POST["Codigo"];
      $Nombre = $_POST["Nombre"];
      $Direccion = $_POST["Direccion"];
      $Telefono = $_POST["Telefono"];
      $SQL = "INSERT INTO clientes(Codigo,Nombre,Direccion,Telefono,Empresa) VALUES('$Codigo','$Nombre','$Direccion','$Telefono','$Empresa')";
      if(mysqli_query($idCone,$SQL))
      {
        $mensaje = "Cliente ingresado con exito";
      }
      else
      {
        $mensaje = "Error ingresando el cliente";
      }
    }
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agregar Cliente</title>
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
            <li class="active"><a href="agregarCliente.php"><dt>Agregar Cliente</dt></a></li>
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
  	 
  	  <h2 style="color:grey">Agregar Cliente</h2>  


      <form class="form-horizontal" role = "form" method = "post" action="agregarCliente.php">

      <div class="row">
          <div class="col-xs-2">
            <label for = "Codigo" class = "control-label" style="color:white">Número de Documento</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="Codigo" name="Codigo" placeholder="Número de Documento"> 
          </div>  
          <div class="col-xs-2">
            <label for = "Nombre" class = "control-label" style="color:white">Nombre Cliente:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre Cliente"> 
          </div>        
      </div>    
      <br>
      <div class="row">
          <div class="col-xs-2"> 
            <label for = "Direccion" class = "control-label" style="color:white">Dirección Cliente:</label>   
          </div>
          <div class="col-xs-3">
             <input class="form-control" type="text" id="Direccion" name="Direccion" placeholder="Direccion Cliente" >
          </div>
          <div class="col-xs-2">
            <label for = "Telefono" class = "control-label" style="color:white">Telefono:</label> 
          </div>
          <div class="col-xs-3">
            <input class="form-control" type="text" id="Telefono" name="Telefono" placeholder="Telefono"> 
          </div>
      </div>
      <br><br>
      
      <div class = "row">
        <div class="col-xs-11" align="center">
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