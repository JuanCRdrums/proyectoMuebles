<?php
  require("conexion.php");
  $idCone = conexion();
  header('location: consultarCobroCodigo.php');
  if(isset($_POST["submit2"]))
  {
    $Abono = $_POST["Abono"];
    $FechaAbono = $_POST["FechaAbono"];
    $Numero = $_POST["Numero"];
    $CodMueble = $_POST["CodMueble"];
    $Valor = $_POST["Valor"];
    $Sena = $_POST["Sena"];
    $Saldo = $Valor - $Sena;
    $AbonoTotal = 0; 

    $SQL = "INSERT INTO abonos(CodCobro, Fecha, Abono,CodMueble, Saldo) VALUES ('$Numero','$FechaAbono','$Abono', '$CodMueble','$Saldo') ";

    if(mysqli_query($idCone,$SQL) )
    {
      $mensaje = "Abono ingresado";
    }
    else
    {
      $mensaje = "Error ingresando abono";
    }

    $SQLCodigoAbono = "SELECT Abono FROM abonos WHERE(CodCobro LIKE '$Numero')";
    $CodigoAbono = mysqli_query($idCone,$SQLCodigoAbono);
    while($F = mysqli_fetch_array($CodigoAbono))
    {
      $AbonoTotal = $AbonoTotal + $F["Abono"]; 
    }

    $SaldoActual = $Saldo - $AbonoTotal;

    $SQL1 = "UPDATE abonos SET Saldo = $SaldoActual WHERE (CodCobro LIKE '$Numero') and (Fecha LIKE '$FechaAbono')"; 
    
    if(mysqli_query($idCone,$SQL1))
    {
      $mensaje1 = "update bien";
    }
    else
    {
      $mensaje1 = "Error ingresando update";
    }
  }

?>