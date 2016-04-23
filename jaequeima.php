<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Já é Queima?</title>
		<link rel="stylesheet" href="assets/css/normalize.css">
		<link rel="stylesheet" href="assets/css/jaequeima.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:300,400,700"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	</head>
	<body>
		<?php // Google Analytics Tracking Code ?>
		<?php include_once("analyticstracking.php") ?>
		<!-- <div class="overlay"> </div> -->
		<div class="container">
			<div class="container_top">
				<h1 class="title">Ainda não é Queima</h1>
			</div>
			<div class="container_middle">
				<h2 class="subtitle">Faltam</h2>
				<div id="clockdiv">
					<div>
						<span class="dias numbers"></span>
						<div class="legenda">Dias</div>
					</div>
					<div>
						<span class="horas numbers"></span>
						<div class="legenda">Horas</div>
					</div>
					<div>
						<span class="minutos numbers"></span>
						<div class="legenda">Minutos</div>
					</div>
					<div>
						<span class="segundos numbers"></span>
						<div class="legenda">Segundos</div>
					</div>
				</div>
			</div>
			<script src="assets/js/jaequeima.js"></script>
			<div class="container_bottom">
				<img id="logo" src="assets/img/logo_big.png">
				<?php
	                $link = get_permalink();
	                $link = 'https://www.facebook.com/sharer/sharer.php?u='.$link;
	            ?>
	            <div class="button_fb" id="share_button" >
	                <a href="<?php echo $link; ?>" target="_blank">
	                    <i class="fa fa-facebook-official"></i> Partilhar
	                </a>
	            </div>
			</div>
		</div>

	</body>
</html>
