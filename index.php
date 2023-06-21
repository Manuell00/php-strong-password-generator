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
            display:flex;
            align-items:center;
            flex-direction:column;
            width : 100%;
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
    </style>
</head>
<body>

    <!-- Imposto le direttive utili del codice php -->
    <?php
       // Includo le funzioni
       include __DIR__. '/partials/function.php';

        //DEFINISCO LE VARIABILI :
        $lenpassword = $_GET["lenpassword"];
        $password = getRandomLetters($lenpassword);

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
                <div class="riga">
                    <label for="lenpassword">Lunghezza password: </label>
                    <input type="number" name="lenpassword" id="lenpassword">
                </div>

                <div class="riga">
                    <div>Consenti la ripetizionedi uno o più caratteri:</div>
                    <div>
                        <input type="radio" id="morecharacter" name="morecharacter" value="Si">
                        <label for="morecharacter">Si</label><br>
                        <input type="radio" id="lesscharacter" name="lesscharacter" value="No">
                        <label for="lesscharacter">No</label><br>
                    </div>

                    </div>
          

                <input type="submit" value="Invia">

            </form>

            <?php
            // Isset mi restituisce true se la variabile non è nulla
                if ($lenpassword!=0) {
                    locate();
                } 
            ?>

         
        </div>
    </div>
    

 
</body>
</html>