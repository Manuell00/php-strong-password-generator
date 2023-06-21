<!-- Definisco la lunghezza della password che ho inserito -->
<?php
    // Definisco una funzione che mi ritorni la lunghezza della password
    function getRandomLetters($length, $allowRepetition, $includeLetters, $includeNumbers, $includeSymbols) {
        // Inizializzo una stringa vuota per la password generata
        $password = "";
    
        // Definisco i caratteri consentiti in base alle opzioni selezionate
        $characters = "";
        if ($includeLetters) {
            $characters .= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        if ($includeNumbers) {
            $characters .= "0123456789";
        }
        if ($includeSymbols) {
            $characters .= "!@#$%^&*()";
        }
    
        // Genero la password selezionando caratteri casuali dalla stringa dei caratteri consentiti
        for ($i = 0; $i < $length; $i++) {
            $index = random_int(0, strlen($characters) - 1);
            $password .= $characters[$index];
    
            // Se la ripetizione non è consentita, rimuovi il carattere dalla stringa dei caratteri consentiti
            if (!$allowRepetition) {
                $characters = substr_replace($characters, '', $index, 1);
            }
        }
    
        // Restituisci la password generata
        return $password;
    }
    
    

    // Definisco una funzione che mi indirizzi ad un altra pagina
    function locate() {
        header('Location: ./password.php');
    }
?>