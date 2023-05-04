<?php

session_start();
include_once 'database/db.php';

if (isset($_POST['botao'])) {
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    $q1 = "SELECT ID, ADMINISTRADOR FROM CADASTROS WHERE EMAIL = '$email' AND SENHA = '$senha'";
    @$id = mysqli_fetch_array(mysqli_query($conn, $q1))[0];
    @$admin = mysqli_fetch_array(mysqli_query($conn, $q1))[1];

    if ($id == null) {
        echo "<script>alert('Email ou Senha Incorretos.')</script>";
    } else {
        session_destroy();
        session_start();

        $_SESSION['id'] = $id;
        $_SESSION['admin'] = $admin;

        header('Location: home.php');
    }

}
?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    
    <body>
        <form method="post">
            <input type="email" name="email">
            <input type="password" name="senha">
            <input type="submit" name="botao" value="Entrar"><br>
            <a href="cadastroBR.php">Criar Conta</a>
        </form>
    </body>
</html>