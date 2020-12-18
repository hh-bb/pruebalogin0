<?php 

include ("cn.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$medicacion = $_POST["medicacion"];
$dosis = $_POST["dosis"];
$dosisindicada = $_POST["dosisindicada"];
$fechareceta = $_POST["fechareceta"];

$insertar = "INSERT INTO pacientes(nombre, apellido, medicacion, dosis, dosisindicada, fechareceta) VALUES('$nombre', '$apellido', '$medicacion', '$dosis', '$dosisindicada', '$fechareceta')";

$resultado = mysqli_query($conexion, $insertar);
if($resultado) {
	echo "<script>alert('Se ha registrado paciente correctamente'); window.location='/php-login'</script>"; 
} else {
	echo "<script>alert('No se pudo registrar'); window.history.go(-1);</script>";
}