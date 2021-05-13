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
    <div id="app" class="container text-center">
        <div class="row">
            <div class="col-12 mt-3">

                <h1>DB</h1>

                <?php
                    
                    require_once 'data.php';
                    $id =(int) $_GET['room_number'];

                    $conn = getConnection();
                    $sql = getStanzaByNumber();

                    // $sql = "SELECT name,lastname FROM ospiti WHERE id = ? ";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> bind_param("i",$id);
                    $stmt -> execute();
                    $stmt -> bind_result($floor,$beds);
                    //$stmt -> fetch();
                    //var_dump($name, $lastname);
                    while($stmt -> fetch()){
                         echo '<h2>Stanza numero '.$id.'</h2>';
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