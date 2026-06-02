<?php

require 'db.connection.php'; 

$placa = $_POST['placa'] ?? ''; 
$modelo = $_POST['modelo'] ?? ''; 
$ano = $_POST['ano'] ?? ''; 


if ($placa === '' || $modelo === '' || $ano === '') { 
    die('Preencha todos os campos.');
}

$sql = "INSERT INTO veiculos (placa, modelo, ano) VALUES (:placa, :modelo, :ano)"; 


$stmt = $pdo->prepare($sql); 

$stmt->execute([
    ':placa' => $placa, 
    ':modelo' => $modelo, 
    ':ano' => $ano
]);

header('Location: index.php');
exit;