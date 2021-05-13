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
    <title>Dettaglio stanza</title>
</head>
<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-12 mt-3">

                <h1>Dettaglio stanza</h1>

                <?php
                    
                    require_once 'data.php';
                    $id = $_GET['room_id'];

                    $conn = getConnection();
                    $sql = getStanzaByNumber();

                    $stmt = $conn -> prepare($sql);
                    $stmt -> bind_param("i",$id);
                    $stmt -> execute();
                    $stmt -> bind_result($room_number,$floor,$beds);
                    while($stmt -> fetch()){
                         echo '<h2>Stanza numero '.$room_number.'</h2>';
                         echo '<p>Piano: '.$floor.'</p>';
                         echo '<p>Numero letti '.$beds.'</p>';
                    }

                    $stmt -> close();
                    $conn -> close();
                ?>
                
            </div>
        </div>
    </div>
</html>