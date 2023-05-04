<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aeroporto</title>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/aeroporto/aeroport.css">
    <link rel="stylesheet" href="./css/aeroporto/media.css">
</head>

<body>

    <?php

include_once "./db.php";

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>

    <script src="./query_cidade.js"></script>
    <script src="../../js/add/query_cidade.js"></script>

    <header>
        <h2>Cadastrar Cidade</h2>
    </header>
    <main>
        <section class="aeroport-form">

            <?php
            
            session_start();

            if (isset($_SESSION['callback'])) {
                echo $_SESSION['callback'];
                unset($_SESSION['callback']);
            }
            
            ?>

            <form action="./adicoes.php" method="post">

                <input type="hidden" name="objeto" value="cidade">
                <input type="hidden" name="op" value="add">

                <img src="./img/logo_nefelus-removebg-preview 2.png" alt="logo">

                <label for="">Estado</label>

                <select name="estado" required class="estado">

                    <option value="">...</option>
                    <?php 

                        $query_estados = mysqli_query($conn, "SELECT * FROM estado");

                        while($row=mysqli_fetch_assoc($query_estados)) {
                            echo "<option value='" . $row['id_estado'] . "'>" . $row['sigla_estado'] . " - " . $row['nome_estado'] . "</option>";
                        }
                    
                    ?>
                </select>
                </div>

                <label for="">Nome da cidade:</label>
                <input type="text" name="cidade" maxlength="50" id="cidade">

                <button type="submit">Enviar</button>
            </form>
        </section>

    </main>
</body>

</html>