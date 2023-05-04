<?php

// Iniciar uma sessão e conectar-se ao banco de dados.
session_start();
require_once 'database/db.php';
require_once 'database/queries.php';

// Se o botão 'Cadastrar' for clicado executar o código. 
if (isset($_POST['botao'])) {

    // Pegar as informações do fomulário.
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $pais = $_POST['paises'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    // Queries para a tabela CADASTROS.

    $qc1 = "INSERT INTO CADASTROS(EMAIL, SENHA) VALUES('$email', '$senha')";

    $qc2 = "SELECT COUNT(*) FROM CADASTROS WHERE EMAIL = '$email'";
    $qc3 = "SELECT COUNT(*) FROM PESSOAS WHERE CELULAR = '$celular'";

    $erro = false;

    if (mysqli_fetch_array(mysqli_query($conn, $qc2))[0] > 0) {
        echo "<script>alert('Email already registered.')</script>";
        $erro = true;
    };

    if (mysqli_fetch_array(mysqli_query($conn, $qc3))[0] > 0) {
        echo "<script>alert('Cellphone already registered.')</script>";
        $erro = true;
    };

    if (!$erro == true) {
        mysqli_query($conn, $qc1);

        // Queries para a tabela PESSOAS.

        $qp1 = "SELECT ID FROM CADASTROS WHERE EMAIL = '$email'";
        $idConta = mysqli_fetch_array(mysqli_query($conn, $qp1))[0];
        
        $qp2 = "INSERT INTO PESSOAS(CADASTRO_ID, NOME, SOBRENOME, NASCIMENTO, PAIS, CELULAR) VALUES('$idConta', '$nome', '$sobrenome', '$nascimento', '$pais', '$celular')";

        // Enviar para a Database.
            mysqli_query($conn, $qp2);
            echo "<script>alert('Account registered successfully!')</script>";
            header('Location: login.php');
    };
};

?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/cadastro.css">
    </head>
    
    <body>
        <form method="post">
            <input type="text" name="nome" placeholder="Name" required>
            <input type="text" name="sobrenome" placeholder="Last Name" required>
            <input type="date" name="nascimento" max="<?php echo date('Y-m-d') ?>" onkeydown="return false"  required>
            <select name="paises"></select><br>


            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="celular" placeholder="Cellphone" maxlength="15" required>
            <input type="password" name="senha" placeholder="Password" required><br>

            <input type="submit" name="botao" value="Cadastrar">

            <a href="login.php">Already has an account?</a>
            <a href="cadastroBR.php">Você é do Brasil?</a>
        </form>
    </body>
</html>

<script src="scripts/cadastroWR.js"></script>