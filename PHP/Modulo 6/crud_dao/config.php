<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=crud_vagas', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro de Conexão: ' . $e->getMessage();
}
