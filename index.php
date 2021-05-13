<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap v4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background: purple;
            color: white;
        }
        a{
            color: white;
            text-decoration: underline;
        }
    </style>
    <title>Elenco stanze</title>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 mt-3">

                <h1>Totale stanze</h1>

                <?php
                    
                    require_once 'data.php';

                    $conn = getConnection();
                    $sql = getStanzeSql(); 
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $stmt -> bind_result($room_id, $room_number);
                    while($stmt -> fetch()){
                        echo '<a href="room_details.php?room_id='.$room_id.'">Stanza numero '.$room_number.'</a><br>';
                    }

                    $stmt -> close();
                    $conn -> close();    
                ?>

            </div>
        </div>
    </div>
</html>