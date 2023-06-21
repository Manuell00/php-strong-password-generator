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

        .container h1{
            opacity:0.7;
            font-size: 50px;
            margin-bottom:15px
        }
        .container h2{
            font-size: 35px;
            margin-bottom:15px
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container text-center pt-5 pb-5">
            <h1>La tua password</h1>
            <h2>
                <!-- Inserisco la session -->
                <?php
                    echo $_SESSION["password"];
                ?>
            </h2>
        </div>
    </div>
    

 
</body>
</html>