<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aviões</title>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/aviao/aviao.css">
    <link rel="stylesheet" href="./css/aviao/media.css">
</head>

<?php

include_once "../../ops/db.php";


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.js"></script>

<script src="../../js/add/query_cidade.js"></script>
<script src="../../js/add/query_aeroporto.js"></script>

<body>
    <header>
        <h2>Cadastrar Avião</h2>
    </header>
    <main>
        <section class="plane-form">
            <form action="../../ops/alteracoes.php" method="post">

                <input type="hidden" name="objeto" value="aviao">
                <input type="hidden" name="op" value="add">

                <img src="./img/logo_nefelus-removebg-preview 2.png" alt="logo">

                <div class="input-control">
                    <label for="">Matrícula de Registro</label>
                    <input type="text" required name="matricula" maxlength="5" pattern="[pP][a-zA-Z]{4}" maxlength="50" placeholder="Modelo">
                </div>

                <div class="input-control">
                <input type="text" required name="modelo" maxlength="50" placeholder="Modelo">
                </div>
                <div class="input-control">
                <input type="number" required name="carga" placeholder="Carga">
                </div>

                <div class="input-control">
                <input type="number" required name="velocidade" placeholder="Velocidade">
                </div>
                <!-- <input type="number" required name="assento" placeholder="Id Assento"> -->

                <hr>

                <h2>Aeroporto</h2>
                <label for="">Estado</label>
                <select name="" class="estado">
                    <option value=''>...</option>

                    <?php 

                    $query_estados = mysqli_query($conn, "SELECT * FROM estado");

                    while($row=mysqli_fetch_assoc($query_estados)) {
                        echo "<option value='" . $row['id_estado'] . "'>" . $row['sigla_estado'] . " - " . $row['nome_estado'] . "</option>";
                    }
                    
                    ?>
                </select>

                <label for="">Cidade</label>
                <select name="" class="cidade">
                    <option value=''>...</option>
                </select>

                <label for="">Aeroporto</label>
                <select name="aeroporto" class="aeroporto">
                    <option value=''>...</option>
                </select>

                <button type="submit">Enviar</button>
            </form>
        </section> 
    </main>
</body>
</html>
