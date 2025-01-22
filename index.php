<?php
   session_start();
   
   if (isset($_SESSION['combinazionePC'])) {
       // se la combinazione del computer è settata
       echo "Combinazione PC già settata: ";
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
       echo "Combinazione generata: ";
       echo "<pre>";
       print_r($combinazionePC);
       echo "</pre>";
   }
   ?>
<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>MASTERMIND</h1>
    <div class="w-50 mx-auto my-auto text-center">
        <form action="./process.php">
        <table class="table table-bordered ">
        <tr>
            <td><!--SELEZIONE COLORE 1!-->
                <input type="radio" id="rosso" name="color1" value="rosso">
                <label for="rosso" class="text-danger">rosso</label><br>
                <input type="radio" id="verde" name="color1" value="verde">
                <label for="verde" class="text-success">verde</label><br>
                <input type="radio" id="blu" name="color1" value="blu">
                <label for="blu" class="text-primary">blu</label><br>
                <input type="radio" id="giallo" name="color1" value="giallo">
                <label for="giallo" class="text-warning" >Giallo</label>
            </td>

            <td><!--SELEZIONE COLORE 2 !-->
                <input type="radio" id="rosso" name="color2" value="rosso">
                <label for="rosso" class="text-danger">rosso</label><br>
                <input type="radio" id="verde" name="color2" value="verde">
                <label for="verde" class="text-success">verde</label><br>
                <input type="radio" id="blu" name="color2" value="blu">
                <label for="blu" class="text-primary">blu</label><br>
                <input type="radio" id="giallo" name="color2" value="giallo">
                <label for="giallo" class="text-warning" >Giallo</label>      
            </td>

            <td><!--SELEZIONE COLORE 3 !-->
                <input type="radio" id="rosso" name="color3" value="rosso">
                <label for="rosso" class="text-danger">rosso</label><br>
                <input type="radio" id="verde" name="color3" value="verde">
                <label for="verde" class="text-success">verde</label><br>
                <input type="radio" id="blu" name="color3" value="blu">
                <label for="blu" class="text-primary">blu</label><br>
                <input type="radio" id="giallo" name="color3" value="giallo">
                <label for="giallo" class="text-warning" >Giallo</label>    
            </td>
            <td><!--SELEZIONE COLORE 4 !-->
                <input type="radio" id="rosso" name="color4" value="rosso">
                <label for="rosso" class="text-danger">rosso</label><br>
                <input type="radio" id="verde" name="color4" value="verde">
                <label for="verde" class="text-success">verde</label><br>
                <input type="radio" id="blu" name="color4" value="blu">
                <label for="blu" class="text-primary">blu</label><br>
                <input type="radio" id="giallo" name="color4" value="giallo">
                <label for="giallo" class="text-warning" >Giallo</label>    
            </td>
        </table>
            <button type="submit" class="btn btn-info">Invia</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>