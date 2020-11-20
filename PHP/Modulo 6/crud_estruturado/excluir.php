<?php

require_once 'config.php';

$id = filter_input(INPUT_GET, 'id');

if ($id){
    $sqlDelete = $conexao->prepare("DELETE FROM vagas WHERE id = :id");
    $sqlDelete->bindValue(':id', $id);
    $sqlDelete->execute();
}

header("Location: index.php");