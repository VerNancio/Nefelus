<?php

session_start();
require_once 'database/db.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location: login.php');
}

$id = $_SESSION['id'];

$q1 = "SELECT * FROM PESSOAS WHERE CADASTRO_ID = '$id'";
$info = mysqli_fetch_array(mysqli_query($conn, $q1));
$data = date("d/m/Y", strtotime($info[4]));

?>

<html>
    <head>
        <link rel="stylesheet" href="css/conta.css">
    </head>

    <body>
        <div class="navbar">
            <a href="conta.php">Informações da Conta</a>
            <a href="acompanhantesConta.php">Adicionar Acompanhantes</a>
            <a href="voosConta.php">Voos</a>
            <?php if ($_SESSION['admin'] != 0) {echo "<a href='paginasAdmin.php'>Páginas Admin</a>";} ?>
        </div>
        <?php

        if ($info[6] != null) {
            echo "<h2>Nome: $info[2]</h2>";
            echo "<h2>Sobrenome: $info[3]</h2>";
            echo "<h2>Nascimento: $data</h2>";
            echo "<h2>País: $info[5]</h2>";
            echo "<h2>Endereço: $info[6]</h2>";
            echo "<h2>CPF: $info[7]</h2>";
            echo "<h2>RG: $info[8]</h2>";
            echo "<h2>Celular: $info[9]</h2>";
        } else {
            echo "<h2>Nome: $info[2]</h2>";
            echo "<h2>Sobrenome: $info[3]</h2>";
            echo "<h2>Nascimento: $data</h2>";
            echo "<h2>País: $info[5]</h2>";
            echo "<h2>Celular: $info[9]</h2>";
        };

        ?>
        
    </body>
</html>

