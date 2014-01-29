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
				
				$id = $_POST["txtId"];
				$_SESSION['id']=$id;
				$url = "https://siae.cne.gob.ec/electoral-roll/api/voters/". $id . "/electoral-roll";
				
				$responseJSON = file_get_contents($url);
				$arrayData = json_decode($responseJSON);
				
				//BEGIN - tracking
				$tracking = new Track();
				$tracking->tracking($id);
				//END - tracking
				
				//nombre
				echo $arrayData->{'voter'}->{'fullName'};
				?>
				<div data-role="collapsible-set" data-inset="false">
					<div data-role="collapsible">
    					<h2>Lugar de votación</h2>
    					<p><strong>Recinto</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'name'}; ?></p>
    					<p><strong>Junta</strong></p>
    					<p><?php
						if( $arrayData->{'voter'}->{'gender'} == 'M') {
							$gender = "HOMBRES";
						} else {
							$gender = "MUJERES";
						}
						echo $arrayData->{'voter'}->{'board'} . " " . $gender;
    					?></p>
    					<p><strong>Dirección</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'address'}; ?></p>
    					<p><strong>Provincia</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'province'}; ?></p>
    					<p><strong>Cantón</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'canton'}; ?></p>
    					<p><strong>Parroquia</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'parish'}; ?></p>
    					<p><strong>Zona</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'zone'}; ?></p>
    					<p><strong>Circunscripción</strong></p>
    					<p><?php echo $arrayData->{'voter'}->{'precinct'}->{'district'}; ?></p>
					</div>
				</div>
			</div>
			<div data-role="footer">
		        <div data-role="navbar">
		            <ul>
		                <li><a href="../php/" data-icon="back">Consulta</a></li>
		                <li><a href="#pgComments" data-icon="star" class="ui-btn-active" data-ajax="false">Sugerencias</a></li>
		            </ul>
		        </div>
			</div>
		</div>
		<div data-role="page" id="pgComments">
			<div data-role="header">
					<h1>Consulta de recinto</h1>
			</div>
			<div role="main" class="ui-content">
				<form method="post" action="comments.php">
					<h4>Ayúdanos a mejorar!</h4>
					Por favor cuéntanos tus comentarios y sugerencias:
					<textarea name="txtComments" id="txtComments"></textarea>
					<input type="submit" value="Enviar" name="button" data-icon="check" ui-btn-b data-inline="true" data-mini="true">
				</form>
			</div>
			<div data-role="footer">
				<div data-role="navbar">
			        <ul>
			        	<li><a href="#pgData" data-icon="back">Consulta</a></li>
			            <li><a href="index.html" data-icon="home" class="ui-btn-active">Salir</a></li>
			    	</ul>
				</div>
			</div>
		</div>
	</body>
</html>