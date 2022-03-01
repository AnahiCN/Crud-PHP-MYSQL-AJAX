<?php

$idT = $_POST['idT'];
require('Conexion.php');
$con = Conectar();
$sql = 'DELETE FROM torques WHERE id=:idTorque';
$q = $con->prepare($sql);
$q->execute(array(':idTorque' => $idT));
?>
