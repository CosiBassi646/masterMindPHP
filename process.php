<?php
    session_start();
?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php
        $color1 = $_GET['color1'];
        $color2 = $_GET['color2'];
        $color3 = $_GET['color3'];
        $color4 = $_GET['color4'];
        $coloriUtente = array($color1, $color2, $color3, $color4);
        $tentativiUtente = $_SESSION['tentativiUtente'];
        array_push($tentativiUtente, $coloriUtente);
        $_SESSION['tentativiUtente'] = $tentativiUtente;
        for($i=0;$i<count($coloriUtente);$i++){
            echo $coloriUtente[$i];
        }
        $combinazionePC =  $_SESSION['combinazionePC'];
        if($combinazionePC == $coloriUtente){
            echo "COMPLIMENTI HAI VINTO!";
        }else{
          echo "diversi!";
        }

        
    ?>
    <a href="./index.php">ritenta</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>