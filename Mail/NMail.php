<?php

/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';*/

//----------------------------------------
function email($list)
{

	try {
		$correoTo = $list['correo'];
		$nombre = $list['nombre'];
		$marca = $list['marca'];
		$modelo = $list['modelo'];
		$correo = 'suport@cabezasrentacar.com';
		$fech_in = $list['f_recogida'];
		$fecha_fin = $list['f_entrega'];
		$img = '../views/re/img/' . $list['img'];
		$headers = "MIME-Version: 1.0" . "/r/n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "/r/n";
		$headers .= "From: <$correo>" . "/r/n";
		$headers .= "Cc: $correoTo" . "/r/n";

		$mensaje =
			"<html> 
		<head></head>
		<body> 
		$nombre
		<br> Le saluda el equipo de Cabezas Rent a Car, confirmando su reserva para el auto: <br>
		Marca: $marca 
	<br> Modelo: $modelo
	<br> Fecha de inicio de alquiler: $fech_in
	<br> Fecha de finalización de alquiler: $fecha_fin
	<br> <img href=$img/>
	</body> 
	</html>";

		$asunto = 'Confirmación de Reserva Cabezas Rent a Car';
		$req = mail($correoTo, $asunto, $mensaje, $headers);
		if ($req) return true;
		else return false;
	} catch (Exception $e) {
		return false;
	}
}
