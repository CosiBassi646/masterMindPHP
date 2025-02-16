<?php
   session_start();
   //tentativi
   if (isset( $_SESSION['tentativiUtente'])) {
    // se la combinazione del computer è settata  
    } else {
        $_SESSION['tentativiUtente'] = array();
    }

    $_SESSION['esitoPartita'] = false;

    //suggerimenti
   if (isset( $_SESSION['suggerimenti'])) {
    // se la combinazione del computer è settata  
    } else {
        $_SESSION['suggerimenti'] = array();
    }

    //combinazione random del pc
   if (isset($_SESSION['combinazionePC'])) {
       // se la combinazione del computer è settata
       //echo "Combinazione PC già settata: ";
      echo "<pre>";
       print_r($_SESSION['combinazionePC']);
       echo "</pre>";
 } else {
       $combinazionePC = array();
       for ($i = 0; $i < 4; $i++) {
           $numero = rand(1, 4);
           switch ($numero) {
               case 1:
                   array_push($combinazionePC, "rosso");
                   break;
               case 2:
                   array_push($combinazionePC, "blu");
                   break;
               case 3:
                   array_push($combinazionePC, "giallo");
                   break;
               case 4:
                   array_push($combinazionePC, "verde");
                   break;
           }
       }
   
       // Salvo la combinazione nel sessione
       $_SESSION['combinazionePC'] = $combinazionePC;
   
       // Stampa la combinazione appena generata
      // echo "Combinazione generata: ";
      // echo "<pre>";
      // print_r($combinazionePC);
     //  echo "</pre>";
   }
  echo ".";
   ?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MASTERMIND</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--google fonts!-->

</head>
  <body>
    <div class="mx-auto my-auto w-25">
        <h1 class="titolo1 text-danger">MASTER MIND</h1>
        <h5 class="titolo1 text-dark">crea una combinazione e premi Invia!</h5>
        <hr>
    </div>
  <div class="w-50 mx-auto my-auto text-center">
        <form action="./process.php">
        <table class="table table-bordered ">
        <tr>
            <td><!--SELEZIONE COLORE 1!-->
                <input type="radio" id="rosso" name="color1" value="rosso">
                    <label for="rosso" class="text-danger"><img src="./images/rosso(1).gif"></label><br>
                <input type="radio" id="verde" name="color1" value="verde">
                    <label for="verde" class="text-success"><img src="./images/verde.gif"></label><br>
                <input type="radio" id="blu" name="color1" value="blu">
                    <label for="blu" class="text-primary"><img src="./images/blu.gif"></label><br>
                <input type="radio" id="giallo" name="color1" value="giallo">
                    <label for="giallo" class="text-warning" ><img src="./images/giallo.gif"></label>
            </td>

            <td><!--SELEZIONE COLORE 2 !-->
                <input type="radio" id="rosso" name="color2" value="rosso">
                    <label for="rosso" class="text-danger"><img src="./images/rosso(1).gif"></label><br>
                <input type="radio" id="verde" name="color2" value="verde">
                    <label for="verde" class="text-success"><img src="./images/verde.gif"></label><br>
                <input type="radio" id="blu" name="color2" value="blu">
                    <label for="blu" class="text-primary"><img src="./images/blu.gif"></label><br>
                <input type="radio" id="giallo" name="color2" value="giallo">
              <label for="giallo" class="text-warning" ><img src="./images/giallo.gif"></label>      
            </td>

            <td><!--SELEZIONE COLORE 3 !-->
                <input type="radio" id="rosso" name="color3" value="rosso">
                    <label for="rosso" class="text-danger"><img src="./images/rosso(1).gif"></label><br>
                <input type="radio" id="verde" name="color3" value="verde">
                    <label for="verde" class="text-success"><img src="./images/verde.gif"></label><br>
                <input type="radio" id="blu" name="color3" value="blu">
                    <label for="blu" class="text-primary"><img src="./images/blu.gif"></label><br>
                <input type="radio" id="giallo" name="color3" value="giallo">
                    <label for="giallo" class="text-warning" ><img src="./images/giallo.gif"></label>    
            </td>
            <td><!--SELEZIONE COLORE 4 !-->
                <input type="radio" id="rosso" name="color4" value="rosso">
                    <label for="rosso" class="text-danger"><img src="./images/rosso(1).gif"></label><br>
                <input type="radio" id="verde" name="color4" value="verde">
                    <label for="verde" class="text-success"><img src="./images/verde.gif"></label><br>
                <input type="radio" id="blu" name="color4" value="blu">
                    <label for="blu" class="text-primary"></label><img src="./images/blu.gif"><br>
                <input type="radio" id="giallo" name="color4" value="giallo">
                    <label for="giallo" class="text-warning" ><img src="./images/giallo.gif"></label>    
            </td>
        </table>
        <!-- From Uiverse.io by cssbuttons-io --> 
            <button type="submit">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text"> Invia
            </span>
            </button>
        </form>
        
        <!--prova layout a griglia!-->
        <div class="container border text-center">
            <div class="row">
                <div class="col border">
                    <ul class="list-group">
                    <?php //stampa dei tentativi dell'utente
                        $tentativo = $_SESSION['tentativiUtente'] ;
                        echo "<h3>Tentativi:</h3>";
                            if (count($tentativo) > 0) { // controllo se ci sono tentativi
                                for($i=0;$i<count($tentativo);$i++) {          
                                    echo '<li class="list-group-item">';
                                    for($x=0;$x<count($tentativo[$i]);$x++){
                                        if($tentativo[$i][$x] == "rosso"){ //stampa dei tentativi 
                                            echo '<img src="./images/rosso(1).gif">';
                                        }else 
                                            if($tentativo[$i][$x] == "verde"){
                                                echo '<img src="./images/verde.gif">';
                                            
                                        }else
                                            if($tentativo[$i][$x] == "giallo"){
                                                echo '<img src="./images/giallo.gif">';
                                            
                                        }else
                                            if($tentativo[$i][$x] == "blu"){
                                                echo '<img src="./images/blu.gif">';
                                            
                                        }
                                    }
                                    echo '</li>';
                                }                        
                            } 
                    ?>
                    </ul>
                </div>
                <div class="col border">
                    <ul class="list-group">
                    <?php
                        $suggerimenti = $_SESSION['suggerimenti'];
                        echo "<h3>Suggerimenti:</h3>";
                        for($i=0;$i<count($suggerimenti);$i++) {    
                            if(!empty($suggerimenti[$i])){
                             echo '<li class="list-group-item">';
                             for($x=0;$x<count($suggerimenti[$i]);$x++){ //stampa l'array contenente i suggerimenti per quel tentativo
                                if($suggerimenti[$i][$x] == "nero"){
                                    echo '<img src="./images/nero.gif">';
                                }else{
                                    echo '<img src="./images/bianco(1).gif">';
                                }
                             }
                            echo '</li>';
                            }else{
                                echo '<li class="list-group-item">';
                                echo "- - - - - -"; // Stampa --- se non ci sono suggerimenti
                                echo '</li>';
                            }

                        }  
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="list-group">  
        </ul>
    </div>
    <br>
    <div class="text-center w-75 mx-auto my-auto">
    <button type="submit">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text"> <a class="link-light" href="./menu.php">Termina partita</a>
            </span>
    </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>