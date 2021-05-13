<?php 
    function getConnection( $servername = "localhost",
                            $username = "root",
                            $password = "root",
                            $dbname = "dbhotel"){ //funzione di verifica connessione

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn && $conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }

        return $conn;
    }

    function getStanzeSql(){ //query per estrarre tutte le stanze
        return "SELECT id,room_number FROM stanze";
    }

    function getStanzaByNumber(){ // query per estrarre dettaglio 1 stanza
        return 'SELECT room_number,floor,beds FROM stanze WHERE id = ?';
    }
?>