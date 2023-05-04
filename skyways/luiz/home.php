<?php

session_start();
require_once 'database/db.php';

?>

<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>
        
        <section class="cor1">
            <h1>Home</h1>
            <?php

                if (session_status() === PHP_SESSION_ACTIVE) {
                    $id = $_SESSION['id'];

                    $q1 = "SELECT NOME FROM PESSOAS WHERE CADASTRO_ID = '$id'";
                    $nome = mysqli_fetch_array(mysqli_query($conn, $q1))[0];

                    echo "<h2>Olá, $nome!</h2>";
                    echo "<a href='conta.php'>Meu Perfil</a>";
                };

            ?>

        </section>

        <section class="cor2">
            <a href="login.php"><h1>Login</h1></a>
        </section>

        <section class="cor3">
            <a href=""><h1>Reservar Passagens</h1></a>
        </section>

        <section class="cor4">
            <a href=""><h1>Ofertas</h1></a>
        </section>

        <section class="cor5">
            <a href=""><h1>Contato</h1></a>
        </section>
    </body>
</html>