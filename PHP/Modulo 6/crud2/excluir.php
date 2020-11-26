<?php

require_once 'config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM vagas WHERE id = :id");
    $stmt->bindValue('id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('Vaga não encontrada!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}