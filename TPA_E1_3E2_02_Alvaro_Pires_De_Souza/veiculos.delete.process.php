<?php

require 'db.connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('ID inválido.');
}

$sql = "DELETE FROM veiculos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;
