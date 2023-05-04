<?php

session_start();
require_once 'database/db.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location: login.php');
}

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
        <?php if ($_SESSION['admin'] === 1) {echo "<a href='adicionarAdmin.php'>Adicionar Admin</a>";} ?>
        <a href="gerenciarVoos.php">Gerenciar Voos</a>
        <a href="clientes.php">Clientes</a>
    </body>
</html>
