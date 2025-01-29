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
        $coloriUtente = array($color1, $color2, $color3, $color4);//combinazione dell'utente
        //bianchi e neri per dare i suggerimenti agli utenti
        $neri = "nero";
        $bianchi = "bianco";
        //memorizzo i vari tentativi nella session
        $tentativiUtente = $_SESSION['tentativiUtente'];
        array_push($tentativiUtente, $coloriUtente);
        $_SESSION['tentativiUtente'] = $tentativiUtente;

        for($i=0;$i<count($coloriUtente);$i++){
            echo $coloriUtente[$i];
        }
        $combinazionePC =  $_SESSION['combinazionePC']; 
        $coloriSuggerimento = $_SESSION['suggerimenti'];//array di suggerimenti
        $suggerimentiTmp = array();//array temporaneo per memorizzare i valori
        // Array per tenere traccia dei colori già contati come neri
        $contatiComeNeri = array();

    // Primo ciclo: conta i neri
    for ($i = 0; $i < 4; $i++) {
        if ($coloriUtente[$i] == $combinazionePC[$i]) { // Metto i neri
            array_push($suggerimentiTmp, $neri);
            $contatiComeNeri[$i] = true; // Segna il colore come già contato come nero
        }
    }

    // Secondo ciclo: conta i bianchi (evitando i colori già contati come neri)
    for ($i = 0; $i < 4; $i++) {
        // Se non è stato già contato come nero, cerco se il colore è presente nel resto della combinazione
        if (!isset($contatiComeNeri[$i]) && array_search($coloriUtente[$i], $combinazionePC) !== false) {
            array_push($suggerimentiTmp, $bianchi);
        }
    }
        $stringaSuggerimenti = ""; // Memorizzo i suggerimenti in una stringa
        for ($i = 0; $i < count($suggerimentiTmp); $i++) {
            $stringaSuggerimenti .= " - " . $suggerimentiTmp[$i]; // Concatenazione corretta
        }
        echo "<br>";
        echo $stringaSuggerimenti;
        
        // Aggiungo i suggerimenti alla sessione
        array_push($coloriSuggerimento, $suggerimentiTmp);
        $_SESSION['suggerimenti'] = $coloriSuggerimento;
        ?>
  
    <a href="./index.php">ritenta</a>
    <a href="./menu.php">Termina partita</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>