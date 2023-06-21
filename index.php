<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inserisco il title -->
    <title>Strong-password generator</title>

    <!-- Inserisco la cdn di Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Style -->
    <style>
        .container-fluid{
           background-color: #010B48;
           height:100vh;
           color : white;
        }

        .container{
            color:black;
        }

        .container h1{
            color:white;
            opacity:0.7;
            font-size: 50px;
            margin-bottom:15px
        }
        .container h2{
            color:white;
            font-size: 35px;
            margin-bottom:15px
        }

        .container form{
            padding:50px 0;
            font-size:20px;
            display:block;
            width : 100%;
            height:auto;
            border-radius: 20px;
            background-color:whitesmoke;
        }

        .riga{
            width:100%;
            display:flex;
            align-items:center;
            justify-content: space-around;
            padding:10px 20px;
        }

        #buttons{
            width:100%;
            display:flex;
            justify-content: flex-start;
            padding:10px 20px;
        }

        #buttons input{
            margin-right:10px;
        }

    </style>
</head>
<body>

    <!-- Imposto le direttive utili del codice php -->
    <?php
       // Includo le funzioni
       include __DIR__. '/partials/function.php';

        //DEFINISCO LE VARIABILI :
        $lenpassword = $_GET["lenpassword"];
        $morecharacter = $_GET["morecharacter"];
        $lesscharacter = $_GET["lesscharacter"];

        // Inserisco gli isset perchè essendo una checkbox no sono certo che siano non vuoti e voglio che mi sia resittuito true per la funzione getRandomLetters
        $includeLetters = isset($_GET["letters"]);
        $includeNumbers = isset($_GET["numbers"]);
        $includeSymbols = isset($_GET["symbols"]);

        // Verifico uguaglianza con il value di allowrepetition
        $allowRepetition = $_GET["allowrepetition"] === "true";

        $password = getRandomLetters($lenpassword, $allowRepetition, $includeLetters, $includeNumbers, $includeSymbols);
        
        // Definisco le variabili di session
        $_SESSION['lenpassword'] = $lenpassword;
        $_SESSION['password'] = $password;

    ?>


    <!-- Definisco il corpo della pagina -->
    <div class="container-fluid">
        <div class="container text-center pt-5 pb-5">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura</h2>
              
            <!-- Inserisco il form -->
            <form class="mt-5">

            <!-- Inserisco l'input per la LUNGHEZZA della password -->
                <div class="riga">
                    <label for="lenpassword">Lunghezza password: </label>
                    <input type="number" name="lenpassword" id="lenpassword" required>
                </div>

                <!-- Inserisco l'input per CHECKBOX e RADIO -->
                <div class="riga">
                    <label>Consenti la ripetizione di uno o più caratteri:</label>
                    <div>
                        <!-- Inserisco i required per far si che debbano obbligatoriamente essere selezionati uno dei due campi -->
                        <input type="radio" id="morecharacter" name="allowrepetition" value="true" required>
                        <label for="morecharacter">Si</label><br>
                        <input type="radio" id="lesscharacter" name="allowrepetition" value="false" required>
                        <label for="lesscharacter">No</label><br>

                        <!-- INSERISCO I CHECK -->

                        <!-- Check lettere -->
                        <input type="checkbox" id="letters" name="letters" value="true">
                        <label for="letters">Lettere</label><br>

                        <!-- Check numeri -->
                        <input type="checkbox" id="numbers" name="numbers" value="true">
                        <label for="numbers">Numeri</label><br>

                        <!-- Check simboli -->
                        <input type="checkbox" id="symbols" name="symbols" value="true">
                        <label for="symbols">Simboli</label><br>
                    </div>
                </div>

                <!-- Inserisco il SUBMIT -->
                <div id="buttons">
                    <input class="btn btn-primary" type="submit" value="Invia">
                    <input class="btn btn-secondary" type="reset" value="Annulla" onclick="resetForm()">
                </div>
            </form>


                <?php
                // Isset mi restituisce true se la variabile non è nulla
                    if ($lenpassword!=0) {
                        locate();
                    } 
                ?>

        </div>
    </div>
    
    <!-- Inserisco una funzione javascript per azzerare i valori della form al loro stato originale una volta cliccato il button annulla -->
    <script>
    function resetForm() {
        document.getElementById("lenpassword").value = ""; // Azzeramento dell'input della lunghezza della password
        document.getElementById("morecharacter").checked = true; // Ripristino del valore predefinito per il radio button
        document.getElementById("letters").checked = false; // Deselezione dei checkbox
        document.getElementById("numbers").checked = false;
        document.getElementById("symbols").checked = false;
    }
    </script>

 
</body>
</html>