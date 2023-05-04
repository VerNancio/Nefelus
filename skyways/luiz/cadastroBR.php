<?php

// Iniciar uma sessão e conectar-se ao banco de dados.
session_start();
require_once 'database/db.php';

// Se o botão 'Cadastrar' for clicado executar o código. 
if (isset($_POST['botao'])) {

    // Pegar as informações do fomulário.
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = "" . $_POST['cep'] . " | " . $_POST['endereco'] . ", " . $_POST['numero'] . " - " . $_POST['bairro'] . " | " . $_POST['cidade'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    // Queries para a tabela CADASTROS.

    $qc1 = "INSERT INTO CADASTROS(EMAIL, SENHA) VALUES('$email', '$senha')";

    $qc2 = "SELECT COUNT(*) FROM CADASTROS WHERE EMAIL = '$email'";
    $qc3 = "SELECT COUNT(*) FROM PESSOAS WHERE CELULAR = '$celular'";
    $qc4 = "SELECT COUNT(*) FROM PESSOAS WHERE CPF = '$cpf'";

    $erro = false;

    if (mysqli_fetch_array(mysqli_query($conn, $qc2))[0] > 0) {
        echo "<script>alert('Email já cadastrado.')</script>";
        $erro = true;
    };

    if (mysqli_fetch_array(mysqli_query($conn, $qc3))[0] > 0) {
        echo "<script>alert('Celular já cadastrado.')</script>";
        $erro = true;
    };

    if (mysqli_fetch_array(mysqli_query($conn, $qc4))[0] > 0) {
        echo "<script>alert('CPF já cadastrado.')</script>";
        $erro = true;
    };
    
    if (!$erro == true) {
        mysqli_query($conn, $qc1);
    };

    // Queries para a tabela PESSOAS.
    
    $qp1 = "SELECT ID FROM CADASTROS WHERE EMAIL = '$email'";
    $idConta = mysqli_fetch_array(mysqli_query($conn, $qp1))[0];
    
    $qp2 = "INSERT INTO PESSOAS(CADASTRO_ID, NOME, SOBRENOME, NASCIMENTO, ENDERECO, CPF, RG, CELULAR) VALUES('$idConta', '$nome', '$sobrenome', '$nascimento', '$endereco', '$cpf', '$rg', '$celular')";

    // Enviar para a Database.
    
    if (!$erro == true) {
        mysqli_query($conn, $qp2);
        echo "<script>alert('Conta cadastrada com sucesso!')</script>";
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
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="sobrenome" placeholder="Sobrenome" required>
            <input type="date" name="nascimento" max="<?php echo date('Y-m-d') ?>" required><br>

            <input type="text" name="cep" placeholder="CEP" maxlength="8" pattern=".{8}" required>
            <input type="text" name="endereco" readonly>
            <input type="text" name="bairro" readonly>
            <input type="text" name="cidade" readonly>
            <input type="text" name="numero" placeholder="Nº" maxlength="5" required><br>

            <input type="text" name="cpf" placeholder="CPF" maxlength="11" required>
            <input type="text" name="rg" placeholder="RG" maxlength="9" required>
            <input type="text" name="celular" placeholder="Celular" maxlength="11" pattern=".{11}" required><br>
            
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required><br>

            <input type="submit" name="botao" value="Cadastrar">

            <a href="login.php">Já tem uma conta?</a>
            <a href="cadastroWR.php">Are you not from Brazil?</a>
        </form>
    </body>
</html>

<script src="scripts/cadastroBR.js"></script>