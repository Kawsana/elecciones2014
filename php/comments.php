<!DOCTYPE html>
<html>
	<head>
		<title>Consulta de recinto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="resources/css/elecciones2014.min.css" />
		<link rel="stylesheet" href="resources/css/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="resources/css/jquery.mobile.structure-1.4.0.min.css" />
		<script type="text/javascript" src="resources/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="resources/js/jquery.mobile-1.4.0.min.js"></script>
	</head>
	<body>
		<div data-role="page" id="pgData">
			<div data-role="header">
				<h1>Consulta de recinto</h1>
			</div>
			<div role="main" class="ui-content">
				<?php
					include ("src/track.php");
					session_start();
					
					$comment = $_POST["txtComments"];
					
					//BEGIN - tracking
					$tracking = new Track();
					$tracking->comment($_SESSION['id'], $comment);
					//END - tracking
					
					session_destroy();
				?>
				<h4>¡Gracias!</h4>
				Regresa pronto para ver tu sugerencia hecha realidad.
			</div>
			<div data-role="footer">
		        <div data-role="navbar">
		            <ul>
		                <li><a href="core.php" data-icon="back">Consulta</a></li>
		                <li><a href="index.html" data-icon="home" class="ui-btn-active">Salir</a></li>
		            </ul>
		        </div>
			</div>
		</div>
	</body>
</html>
