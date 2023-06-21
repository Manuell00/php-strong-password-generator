<!-- Definisco la lunghezza della password che ho inserito -->
<?php
    // Definisco una funzione che mi ritorni la lunghezza della password
    function getRandomLetters($length, $allowRepetition) {
        $letters = range('a', 'z'); // Genera un array con tutte le lettere minuscole dell'alfabeto
        $randomLetters = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = array_rand($letters); // Seleziona un indice casuale dall'array
    
            // Verifica se la ripetizione dei caratteri è consentita
            if (!$allowRepetition) {
                // Verifica se il carattere selezionato è già presente nella stringa di lettere casuali
                while (strpos($randomLetters, $letters[$randomIndex]) !== false) {
                    $randomIndex = array_rand($letters); // Seleziona un nuovo indice casuale finché non si ottiene un carattere non ripetuto
                }
            }
    
            $randomLetters .= $letters[$randomIndex]; // Aggiunge la lettera corrispondente all'indice casuale alla stringa di lettere casuali
        }
    
        return $randomLetters;
    }
    

    // Definisco una funzione che mi indirizzi ad un altra pagina
    function locate() {
        header('Location: ./password.php');
    }
?>