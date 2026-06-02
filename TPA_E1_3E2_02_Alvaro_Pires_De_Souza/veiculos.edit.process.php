<?php

require 'db.connection.php'; 

$id = $_POST['id'] ?? null;
$placa = $_POST['placa'] ?? ''; 
$modelo = $_POST['modelo'] ?? ''; 
$ano = $_POST['ano'] ?? ''; 


if (!$id || $placa === '' || $modelo === '' || $ano === '') {
    die('Dados inválidos.');
}

$sql = "UPDATE veiculos SET placa = :placa, modelo = :modelo, ano = :ano WHERE id = :id"; 


$stmt = $pdo->prepare($sql); 

$stmt->execute([
    ':placa' => $placa, 
    ':modelo' => $modelo, 
    ':ano' => $ano, 
    ':id' => $id 
]);

header('Location: index.php');
exit;