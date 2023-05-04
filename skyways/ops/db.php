<?php

    $host = 'localhost';
    $user = 'root';
    $senha = 'Senai115';
    $database = 'skywaysbd';

    $conn = new mysqli($host, $user, $senha, $database);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }


?>