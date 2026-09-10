<?php

require 'db.connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$placa = strtoupper(trim($_POST['placa'] ?? ''));
$modelo = trim($_POST['modelo'] ?? '');
$ano = filter_input(INPUT_POST, 'ano', FILTER_VALIDATE_INT);
$anoMaximo = (int) date('Y') + 1;

if (
    !$id ||
    $placa === '' ||
    $modelo === '' ||
    !$ano ||
    $ano < 1900 ||
    $ano > $anoMaximo ||
    !preg_match('/^[A-Z0-9-]{6,8}$/', $placa)
) {
    http_response_code(400);
    exit('Dados inválidos. Verifique placa, modelo e ano.');
}

$sql = "UPDATE veiculos SET placa = :placa, modelo = :modelo, ano = :ano WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':placa' => $placa,
    ':modelo' => $modelo,
    ':ano' => $ano,
    ':id' => $id,
]);

header('Location: index.php');
exit;
