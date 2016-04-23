<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<title>Já é Queima?</title>
        <link rel="stylesheet" href="assets/css/jaequeima_dias.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:300,400,700"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

	</head>
	<body>
		<?php // Google Analytics Tracking Code ?>
		<?php include_once("analyticstracking.php") ?>
		
		<div class="overlay_color"> </div>
        <div class="overlay"> </div>
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
            <img id="logo" src="assets/img/logo_big.png">
                <div class="button_fb" id="share_button" >
                    <a href="https://www.facebook.com/sharer/sharer.php&u=index.php&id=<?php echo $id;?>" target="_blank">
                        <i class="fa fa-facebook-official"></i> Partilhar
                    </a>
                </div>
        </div>
        </div>
	</body>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/jquery.min.js><\/script>')</script>
         <script src="js/bootstrap.min.js"></script>
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

</html>
