<!DOCTYPE html>
<html>
	<head>
		<title>Consulta de recinto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="resources/css/jquery.mobile-1.4.0.min.css" />
		<script type="text/javascript" src="resources/js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="resources/js/jquery.mobile-1.4.0.min.js"></script>
	</head>
	<body>
		<div data-role="page" id="page1">
			<div data-role="header">
				<h1>Consulta de recinto</h1>
			</div>
			<div data-role="content">
				<?php
				include ("track.php");
				
				$id = $_POST["txtId"];
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
    					<h2>Recinto</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'name'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Junta</h2>
    					<?php
						if( $arrayData->{'voter'}->{'gender'} == 'M') {
							$gender = "HOMBRES";
						} else {
							$gender = "MUJERES";
						}
						echo $arrayData->{'voter'}->{'board'} . " " . $gender;
    					?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Dirección</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'address'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Provincia</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'province'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Cantón</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'canton'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Parroquia</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'parish'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Zona</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'zone'}; ?>
    				</div>
    				<div data-role="collapsible">
    					<h2>Circunscripción</h2>
    					<?php echo $arrayData->{'voter'}->{'precinct'}->{'district'}; ?>
    				</div>
				</div>
				<a href="index.html" data-role="button" data-icon="back" data-iconpos="right">Atrás</a> 
			</div>
		</div>
	</body>
</html>