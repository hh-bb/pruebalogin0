<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
include("cn.php");
$pacientes = "SELECT * from pacientes";
$pruebafecha = "fechareceta";
$dosis = "dosis";
$dosisindicada = "dosisindicada";



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ControlMed</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
	 <link rel="preconnect" href="https://fonts.gstatic.com">
  </head>
  <body>
  	<?php require 'partials/header.php' ?>


<div class="container-table">
	<div class="table__title">Pacientes registrados</div>
	<div class="table__header">Nombre</div>
	<div class="table__header">Apellido</div>
	<div class="table__header">Medicación</div>
	<div class="table__header">Dosis en presentación</div>
	<div class="table__header">Dosis Indicada</div>
	<div class="table__header">Fecha de receta</div>
	<div class="table__header"> </div>
	<?php $resultado = mysqli_query($conexion, $pacientes);
	while($row=mysqli_fetch_assoc($resultado)) {?>
		<div class="table__item"><?php echo $row["nombre"];?></div>
		<div class="table__item"><?php echo $row["apellido"];?></div>
		<div class="table__item"><?php echo $row["medicacion"];?></div>
		<div class="table__item"><?php echo $row["dosis"];?></div>
		<div class="table__item"><?php echo $row["dosisindicada"];?></div>
		<div class="table__item"><?php echo $row["fechareceta"];?></div>
		<div class="table__item"></div>
	<?php } mysqli_free_result($resultado); ?>
</div>


	
<div class="container-add">
	<h2 class="container__title">Registrar paciente</h2>
	<form action="insertar.php" method="post" class="container__form">
	<label for="" class="container__label"></label>
	<input name="nombre" type="text" class="container__input" placeholder="Nombre">
	<label for="" class="container__label"></label>
	<input name="apellido" type="text" class="container__input" placeholder="Apellido">
	<label for="" class="container__label"></label>
	<input name="medicacion" type="text" class="container__input" placeholder="Medicación">
	<label for="" class="container__label"></label>
	<input name="dosis" type="number" class="container__input" placeholder="Dosis en presentación (mg)">
	<label for="" class="container__label"></label>
	<input name="dosisindicada" type="number" class="container__input" placeholder="Dosis Indicada (mg)">
	<label for="" class="container__label"></label>
	<input name="fechareceta" type="date" class="container__input" placeholder="Fecha de dosis">
	
	<input class="container__submit" type="submit" value="Registrar">
</form>
</div>

<?php require 'partials/footer.php' ?>


