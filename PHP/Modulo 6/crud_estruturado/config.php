<?php

//$pdo = new PDO('mysql:host=localhost;dbname=crud_vagas', 'root', '');

// $db_name = 'crud_vagas';
// $db_host = 'localhost';
// $db_user = 'root';
// $db_pass = '';
// $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);


try {
   $conexao = new PDO('mysql:host=localhost;dbname=crud_vagas', 'root', '');
   $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Erro de Conexão: ' . $e->getMessage();
}


