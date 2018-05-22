<?php
	$SQL = "SELECT cobro.Numero, abonos.Fecha, abonos.Abono, cobro.CodCliente FROM cobro INNER JOIN abonos ON cobro.Numero = abonos.CodCobro ORDER BY cobro.Numero";
    session_start();
    if(!(isset($_SESSION["usuario"])))
      header("location: index.php");
  if(isset($_POST["submit"]))
  {
	  	$fecha = $_POST["fecha"];
	  	if(isset($_POST["fecha"]))
	  	{
	  		$SQL = "SELECT cobro.Numero, abonos.Fecha, abonos.Abono, cobro.CodCliente FROM cobro INNER JOIN abonos ON cobro.Numero = abonos.CodCobro WHERE (abonos.Fecha LIKE '$fecha') ORDER BY cobro.numero";
	  	}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cobrador</title>
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
            <li class="active"><a href="dineroCobrador.php"><dt>Cobrador</dt></a></li>
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

	<h2 style="color:grey">Consulta de cobradores</h2> 

  <form class="form-horizontal" role = "form" method = "post" action="dineroCobrador.php">


        <div class="row">
            <div class="col-xs-2">
              <label for = "fecha" class = "control-label" style="color:white">Fecha a consultar:</label> 
            </div>
            <div class="col-xs-3">
              <input class="form-control" type="date" id="fecha" name="fecha"> 
            </div>            
        </div>
        <br>

        <div class = "row">
          <div class="col-xs-6" align="center">
            <input type="submit"  class="btn btn-primary" id="submit" name="submit" value="Buscar">
          </div>
        </div>
      </form>

      <table class="table table-condensed">
      	<thead>
      	  	<tr>
	          <th style="color:white">Numero de Cobro</th>
	          <th style="color:white">Fecha de abono</th>
	          <th style="color:white">Dinero abonado</th>
	          <th style="color:white">Documento del cliente</th>
	          <th style="color:white">Nombre del cliente</th>
        	</tr>      		
      	</thead>
      	<tbody>
      		<?php
      			require("conexion.php");
          		$idCone = conexion();
      			$Registro = mysqli_query($idCone,$SQL);
      			$total = 0;
      			while($Fila = mysqli_fetch_array($Registro))
      			{
      				echo "<tr class='active'>";
      				echo "<td>$Fila[Numero]</td>";
      				echo "<td>$Fila[Fecha]</td>";
      				echo "<td>$Fila[Abono]</td>";
      				echo "<td>$Fila[CodCliente]</td>";
      				$Registro2 = mysqli_query($idCone,"SELECT Nombre FROM clientes WHERE (Codigo LIKE '$Fila[CodCliente]')");
      				while($Fila1 = mysqli_fetch_array($Registro2))
      				{
      					echo "<td>$Fila1[Nombre]</td>";
      				}
      				$total = $total + $Fila["Abono"];
      			}
      		?>
      	</tbody>
      </table>
      <?php
      	if(isset($_POST["submit"]))
      	{
	      	echo "<h5 style='color:white'>Dinero cobrado el $fecha: </h5>";
	      	echo "<p style='color:white'>$total</p>";
	    }
      ?>

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