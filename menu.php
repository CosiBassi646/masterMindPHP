<?php   
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina finale</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="w-25 text-center mx-auto my-auto"> 
    <h1 class="text-center text-danger">PARTITA TERMINATA!</h1>
    <?php
    $esito = $_SESSION['esitoPartita'];
      if($esito == false){
        echo "hai perso la partita...";
        session_destroy();
      }else{
        echo "hai vinto la partita";
        session_destroy();
      }
    ?>
    <hr>
    <button class="btn btn-primary"><a class="link-light"  href="./index.php">avvia una nuova partita!</a></button>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>