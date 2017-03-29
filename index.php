<!DOCTYPE html>
<html >

<?php error_reporting(0); ?>
<head>
	<meta charset="UTF-8">
	<title>Já é Queima?</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable = no" />
	<meta name="description" content="Ja é Queima das Fitas em Coimbra?">
	<meta name="author" content="RESISTANCE">
	<meta name="keywords" content="">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:300,400,700"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


	<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="assets/img/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="assets/img/favicon/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="assets/img/favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="assets/img/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="assets/img/favicon/manifest.json">
	<link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="apple-mobile-web-app-title" content="Ja é Queima?">
	<meta name="application-name" content="Ja é Queima?">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="assets/img/favicon/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">



	<?php
		//$incioQueima = "2016-05-04 21:00:00";
	$incioQueima = "2017-05-05 21:00:00";
	$fimQueima = "2017-05-12 21:00:00";


	$today = date('Y-m-d');
	$finish = $incioQueima;

	$sepparator = '-';
	$parts_today = explode($sepparator, $today);
	$parts_finish= explode($sepparator, $finish);


	$days_difference = $parts_today[2] - $parts_finish[2];

	    //difference
	$diff = abs(strtotime($finish) - strtotime($today));
	$daysleft=floor($diff/(60*60*24));


	?>


		<?php /*if (new DateTime() > new DateTime($incioQueima) && $days_difference >=0) { ?>
        	<link rel="stylesheet" href="assets/css/jaequeima_dias.css">
        	<script>
        		console.log('<?php echo  $days_difference; ?>');
        		<?php
        			if (!isset($_GET["id"])){ ?>
	                      window.location.href = "index.php?id=" +<?php echo $days_difference; ?>;
	            <?php
	                }
        		?>

        	</script>

        	<?php } else {*/
        		if (new DateTime() > new DateTime($fimQueima)) { ?>
        		<script>var deadline = new Date("2017-05-05 21:00:00");</script>

        		<?php } else{?>
        		<script>var deadline = new Date("2017-05-05 21:00:00");</script>

        		<?php }?>
        		<link rel="stylesheet" href="assets/css/jaequeima.css">
        		<?php// } ?>


        		<meta property="og:url"           content="http://jaequeima.pt" />
        		<meta property="og:type"          content="website" />
        		<meta property="og:title"         content="Ja é Queima?" />
        		<meta property="og:description"   content="Ja é Queima das Fitas em Coimbra ?" />
        		<meta property="og:image"         content="http://jaequeima.pt/assets/img/queima-facebook.jpg" />


        	</head>
        	<body>
        		<nav class="navbar">
        			<div class="container-fluid">
        				<div class="navbar-header">
        					<a href="index.php"><img src="assets/img/logo_nav.png" alt="logo" class="logo_nav"> </a>
        					<button type="button" class="navbar-toggle collapsed icon_collapse" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
        						&#9776;
        					</button>

        				</div>

        				<div class="collapse navbar-collapse" id="myNavbar">
        					<ul class="nav navbar-nav navbar-right">
        						<li><a href="novidades.php">NOVIDADES</a></li>
        						<li><a href="redes.php">REDES SOCIAS</a></li>

        					</ul>

        				</div> 

        			</div>
        		</nav>
        		<?php // Google Analytics Tracking Code ?>
        		<?php include_once("analyticstracking.php") ?>

        		<?php 
        		if (new DateTime() > new DateTime($incioQueima)&& $days_difference >=0) { ?>

        		<div class="overlay_color"> </div>
        		<div class="container">
        			<div class="container_top">
        				<h1 class="title ">Já é Queima!</h1>
        				<div class="border"> </div>
        			</div>

        			<div class="container_middle">
        				<div id="bandas">
        					<?php
        					require("config.php");
        					$id = 0;
        					if (isset($_GET["id"])){
        						$id = $_GET["id"];
        					}
        					$query = "SELECT * FROM main WHERE Dia = '". $id."'";
        					$stmt = $db->prepare($query);
        					$stmt->execute();

        					$rows = $stmt->fetchAll();

        					foreach ($rows as $value){
        						if ($value['Tipo'] == 1){
        							echo "<h2 class='principal'>".$value["Info"] ."</h2>";
        						} elseif ($value["Tipo"] == 2) {
        							echo "<h3 class='secundario'>" .$value["Info"] ."</h3>";
        						}

        					}

        					?>
        				</div>
        				<div id="precos">
        					<div class="border"> </div>
        					<h3 class="precos"> Estudante -
        						<?php
        						foreach ($rows as $value){
        							if ($value["Tipo"] == 3){
        								echo $value["Info"];
        							}

        						}
        						?>€</h3>
        						<h3 class="precos"> Não Estudante -
        							<?php
        							foreach ($rows as $value){

        								if ($value["Tipo"] == 4){
        									echo $value["Info"];
        								}

        							}
        							?>€</h3>
        						</div>


        						<div id="dias">
        							<a id="0" class="dias">sex </a>
        							<a id="1" class="dias">sab</a>
        							<a id="2" class="dias">dom</a>
        							<a id="3" class="dias">seg</a>
        							<a id="4" class="dias">ter</a>
        							<a id="5" class="dias">qua</a>
        							<a id="6" class="dias">qui</a>
        							<a id="7" class="dias">sex</a>
        						</div>
        					</div>

        					<div class="container_bottom">
        						<a href="http://resistance.pt">
        							<img id="logo" src="assets/img/logo_big.png">
        						</a>

        					</div>
        				</div>

        				<?php } else { ?>
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
        						<div class="button_fb" id="share_button" >
		              <!--  <a href="https://www.facebook.com/sharer/sharer.php?u=http://jaequeima.pt/" target="_blank">
		                    <i class="fa fa-facebook-official"></i> Partilhar
		                </a>-->
		            </div>
		        </div>
		    </div>
		    <?php } ?>

		</body>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<?php if (new DateTime() > new DateTime($incioQueima)&& $days_difference >=0 ) { ?>
		<script>window.jQuery || document.write('<script src="js/jquery.min.js><\/script>')</script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
		<script>
		var id=0;
		var colors=["255,196,37","238,50,36","0,150,215","0,70,137","83,36,127","238,50,36","249,157,49","85,25,0"];
		var numberDias = colors.length;
		$(".dias").each(function() {
			$(this).click(function(){
				id= $(this).attr('id');
				window.location.href = "index.php?id=" + id;
			});
		});
		updateColor(<?php echo $id; ?>);
		function updateColor(id){
			for(var i=0; i<numberDias; i++){
				if( i== id){
					$("#"+i).addClass("dia_selected");
					$("#"+i).css("color", "rgb("+colors[id]+")");
					$(".overlay_color").css("background-color", "rgba("+colors[id]+",0.2)");
					$(".border").css("border-color", "rgb("+colors[id]+")");
				}else{
					$("#"+i).css("color", "white");
					$("#"+i).removeClass("dia_selected");
				}
			}

		}
		</script>
		<?php } else { ?>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jaequeima.js"></script>
		<?php } ?>
		</html>
