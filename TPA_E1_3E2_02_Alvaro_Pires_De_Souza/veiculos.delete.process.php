<?php

require 'db.connection.php'; 

$id = $_GET['id'] ?? null; 

if (!$id) {
    die('ID inválido.');
}

$sql = "DELETE FROM veiculos WHERE id = :id"; 

$stmt = $pdo->prepare($sql); 

$stmt->execute([
    ':id' => $id 
]);

header('Location: index.php');
exit;