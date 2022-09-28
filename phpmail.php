<head>
		<meta charset="UTF-8">
		<title>Envío de correo</title>

		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link rel="icon" type="image/png" href="./images/favicon.png">

	</head>
	<body>
	<script src="fonts/sweetalert2.all.min.js"></script> 

		<?php

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require  'Exception.php';
		require  'PHPMailer.php';
		require  'SMTP.php';
		require  'OAuth.php';

		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';

		$nombre = $_POST['contactName'];
		$correo = $_POST['contactEmail'];
		$asunto = $_POST['contactSubject'];
		$mensaje = $_POST['contactMessage'];
		$yo = 'crgonzalezvi@gmail.com';
	    /* $username1send = $conexion->real_escape_string($_POST['username1']); */
	
		try {
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com'; // Host de conexión SMTP
			$mail->SMTPAuth = true;
			$mail->Username = 'crgonzalezvi@gmail.com'; // Usuario SMTP
			$mail->Password = 'oomvtwtctcqbeefx'; // Password SMTP
			$mail->SMTPSecure = 'tls'; // Activar seguridad TLS
			$mail->Port = 587; // Puerto SMTP

			$mail->setFrom('crgonzalezvi@gmail.com', 'Cliente');
			$mail->IsHTML(true);
			$mail->addAddress($yo);


			$mail->Subject = $asunto;
			$mail->Body = '<html>
	<body
	<h2>Hola soy '. $nombre .' </h2>
	<br>
	<span>Mi email es: '. $correo .'</span>
	<br>
	<span> Mi mensaje es: <br> '. $mensaje .' </span>
	<br>
	</body>
</html>';
			$mail->AltBody = "Usted esta viendo este mensaje simple debido a que su servidor de correo no admite formato HTML.";
		    $mail->send()
		?>
		 <script>
   Swal.fire({
   title: 'CORREO ENVIADO EXITOSAMENTE',
   text: 'Muchas gracias por contactarme, en pocos minutos recibiras toda la información que necesites',
   icon: 'success',
   allowOutsideClick: false,
   allowEscapeKey: false,
   confirmButtonText: 'Continuar'
 }).then((result) => {
   if (result.value) {
     window.location = "index.php#contact";
   }
 })

</script>
		<?php
		} catch (Exception $e) {
		?>
						  <script>
  Swal.fire({
  title: 'HUBO UN ERROR',
  text: 'Verifica tu conexión e intentalo de nuevo',
  icon: 'error',
  allowOutsideClick: false,
  allowEscapeKey: false,
  confirmButtonText: 'Continuar'
}).then((result) => {
  if (result.value) {
    window.location = "index.php";
  }
})
</script>
						
	<?php
	}
	?>