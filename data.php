<?php 
    function getConnection( $servername = "localhost",
                            $username = "root",
                            $password = "root",
                            $dbname = "dbhotel"){

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn && $conn->connect_error) {
            echo "Connection failed: " . $conn->connect_error;
        }

        return $conn;
    }

    function getStanzeSql(){
        return "SELECT room_number FROM stanze";
    }

    function getStanzaByNumber(){
        return 'SELECT floor,beds FROM stanze WHERE room_number = ?';
    }
?>