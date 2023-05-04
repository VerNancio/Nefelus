<?php

session_start();
require_once 'database/db.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location: login.php');
}

$id = $_SESSION['id'];

$q1 = "SELECT PAIS FROM PESSOAS WHERE CADASTRO_ID = '$id' LIMIT 1";


if (isset($_POST['botao'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $pais = mysqli_fetch_array(mysqli_query($conn, $q1))[0];

    $q2 = "INSERT INTO PESSOAS(NOME, SOBRENOME, NASCIMENTO, PAIS, ACOMPANHANTE) VALUES('$nome', '$sobrenome', '$nascimento', '$pais', '$id')";
    mysqli_query($conn,$q2);
};

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
        
        <form method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="sobrenome" placeholder="Sobrenome" required>
            <input type="date" name="nascimento" max="<?php echo date('Y-m-d') ?>" required><br>
            <input type="submit" name="botao" value="Adicionar Acompanhante">
        </form>
    </body>
</html>

<script src="scripts/acompanhantesConta.js"></script>