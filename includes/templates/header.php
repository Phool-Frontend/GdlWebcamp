
<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
	$archivoCache = 'cache/'.$pagina.'.php';
	// Cuanto tiempo deberá estar este archivo almacenado
	$tiempo = 36000;
	// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();
?>


<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- CDN LISTO-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

<?php

		$archivo = basename($_SERVER['PHP_SELF']);
		$pagina = str_replace(".php","",$archivo);
		if($pagina == 'invitados' || $pagina == 'index'){
			echo '<link rel="stylesheet" href="css/colorbox.css">';
		}else if($pagina == 'conferencia'){
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />';
		}
	?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha256-oSrCnRYXvHG31SBifqP2PM1uje7SJUyX0nTwO2RJV54=" crossorigin="anonymous" />
<link rel="stylesheet" href="css/main.css">

</head>

<body class="<?php	echo $pagina;	?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="site-header">
	  <div class="hero">
	  	<div class="contenido-header">
			<nav class="redes-sociales">
				
				<a href="admin/login.php">
					<i class="fas fa-crown"><br>
						Admin	
					</i>
				</a>
			
			</nav>
			<div class="informacion-evento">
				<div class="clearfix" id="goliat">
					<p class="fecha"><i class="fas fa-calendar-alt"></i> 10-03 Abr</p>
					<p class="ciudad"><i class="fas fa-map-marker-alt"></i> Huánuco, PE</p>
				</div>
				<h1 class="nombre-sitio">GdlWebCamp</h1>
				<p class="slogan">La mejor conferencia de<span> diseño web</span></p>
			</div><!--.informacion-evento-->

		</div>
	  </div><!--.Hero-->
<style>
.barra{
  margin: 0!important;
}
</style>

	  <div class="barra">
		  <div class="contenedor clearfix">
				<div class="logo">
					<a href="index.php">
						<img src="img/logo.svg" alt="logo gdwebcamp">
					</a>
				</div>

				<div class="menu-movil">
						<span></span>
						<span></span>
						<span></span>
				</div>

				<nav class="navegacion-principal clearfix">
					<a id="nepe" href="conferencia.php">Conferencia</a>
					<a href="calendario.php">Calendario</a>
					<a href="invitados.php">Invitados</a>
					<a href="registro.php">Reservaciones</a>
				</nav>
		  </div><!--,contenedor-->
    </div><!--,barra-->