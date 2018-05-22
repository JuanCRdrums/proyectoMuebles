<?php
$user="root";
$pass="";
$server="localhost";
$bd="muebles";

$con=mysqli_connect($server,$user,$pass,$bd);

$result=mysqli_query($con,"SELECT * FROM articulos");

while ($row = mysqli_fetch_array($result)){
	echo '<option value="'.$row['Nombre'].'">'.$row['Nombre'].'</option>';
}