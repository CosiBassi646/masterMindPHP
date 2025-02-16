<?php
    session_start();
?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina dei risultati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <div class="w-50 mx-auto my-auto text-center">
    <?php
        $combinazionePC = $_SESSION['combinazionePC']; //array con i colori scelti dal pc
        if (!isset($_GET['color1']) || !isset($_GET['color2']) || !isset($_GET['color3']) || !isset($_GET['color4'])) {
            echo "<h2>NON HAI SELEZIONATO I VALORI CORRETTAMENTE!</h2>";
        } else {
        $color1 = $_GET['color1'];
        $color2 = $_GET['color2'];
        $color3 = $_GET['color3'];
        $color4 = $_GET['color4'];
        $coloriUtente = array($color1, $color2, $color3, $color4); // combinazione dell'utente
        
        $neri = "nero";
        $bianchi = "bianco";

        //controllo se ha indovinato
        if($combinazionePC == $coloriUtente){
            header("Location: ./menu.php");
            $_SESSION['esitoPartita'] = true;
            exit;
        }else{
            echo "<h2>Combinazione non corretta</h2>";
            // Memorizzo i tentativi nella sessione
            if (!isset($_SESSION['tentativiUtente'])) {
                $_SESSION['tentativiUtente'] = [];
            }
            $tentativiUtente = $_SESSION['tentativiUtente'];
            array_push($tentativiUtente, $coloriUtente);
            $_SESSION['tentativiUtente'] = $tentativiUtente;

            
            if (!isset($_SESSION['suggerimenti'])) {
                $_SESSION['suggerimenti'] = [];
            }
            $coloriSuggerimento = $_SESSION['suggerimenti']; // Array di suggerimenti
            $suggerimentiTmp = [];

            // Array per tenere traccia delle posizioni già contate
            $usatiPC = array_fill(0, 4, false);
            $usatiUtente = array_fill(0, 4, false);

            // Primo ciclo conta solo i neri
            for ($i = 0; $i < 4; $i++) {
                if ($coloriUtente[$i] == $combinazionePC[$i]) { //controllo Se il colore è esattamente nella posizione giusta
                    array_push($suggerimentiTmp, $neri);
                    $usatiPC[$i] = true; // memorizza il suggerimento corretto
                    $usatiUtente[$i] = true;
                }
            }

            // Secondo ciclo conta i bianchi solo se non sono stati già usati nei neri
            for ($i = 0; $i < 4; $i++) {
                if (!$usatiUtente[$i]) { // Se il colore dell'utente non è già stato contato come nero
                    for ($j = 0; $j < 4; $j++) {
                        if (!$usatiPC[$j] && $coloriUtente[$i] == $combinazionePC[$j]) { // Se il colore esiste nella combinazione PC ed è disponibile
                            array_push($suggerimentiTmp, $bianchi);
                            $usatiPC[$j] = true; // Segna la posizione nella combinazione PC come usata
                            break;
                        }
                    }
                }
            }

            // Costruisco la stringa dei suggerimenti
            $stringaSuggerimenti = implode(" - ", $suggerimentiTmp);
            //echo "<br>" . $stringaSuggerimenti;

            // Aggiungo i suggerimenti alla sessione
            array_push($coloriSuggerimento, $suggerimentiTmp);
            $_SESSION['suggerimenti'] = $coloriSuggerimento;
        }
    }
    header("Location: ./index.php");
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>