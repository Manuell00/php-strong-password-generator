<!-- Definisco la lunghezza della password che ho inserito -->
<?php
    // Definisco una funzione che mi ritorni la lunghezza della password
    function lenFunzione($password) {
        echo strlen($password);
    }

    // Definisco una funzione che mi indirizzi ad un altra pagina
    function locate() {
        header('Location: password.php');
    }
?>