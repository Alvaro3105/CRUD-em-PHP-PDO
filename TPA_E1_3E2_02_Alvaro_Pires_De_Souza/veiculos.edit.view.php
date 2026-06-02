<?php

require 'db.connection.php'; 

$id = $_GET['id'] ?? null; 

if (!$id) {
    die('ID inválido.');
}

$sql = "SELECT id, placa, modelo, ano FROM veiculos WHERE id = :id"; 

$stmt = $pdo->prepare($sql); 

$stmt->execute([
    ':id' => $id 
]);

$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$veiculo) {
    die('Veiculo não encontrado.'); 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar veiculo</title>
</head>
<body>

    <h1>Editar veiculo</h1> 

    <form method="post" action="veiculos.edit.process.php"> 

        <input type="hidden" name="id" value="<?= htmlspecialchars($veiculo['id']) ?>"> 

        <label>Placa:</label> 
        <input type="text" name="placa" value="<?= htmlspecialchars($veiculo['placa']) ?>" required>
        <br><br>

        <label>Modelo:</label> 
        <input type="text" name="modelo" value="<?= htmlspecialchars($veiculo['modelo']) ?>" required>
        <br><br>

        <label>Ano:</label>
        <input type="number" name="ano" value="<?= htmlspecialchars($veiculo['ano']) ?>" required>
        <br><br>

        <button type="submit">Atualizar</button>

    </form>

    <br>

    <a href="index.php">Voltar</a>

</body>
</html>