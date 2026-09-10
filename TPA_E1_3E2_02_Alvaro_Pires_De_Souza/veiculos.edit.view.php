<?php

require 'db.connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('ID inválido.');
}

$sql = "SELECT id, placa, modelo, ano FROM veiculos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$veiculo) {
    http_response_code(404);
    exit('Veículo não encontrado.');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <section class="form-card">
            <p class="eyebrow">Registro #<?= htmlspecialchars((string) $veiculo['id']) ?></p>
            <h1>Editar veículo</h1>
            <p>Atualize os dados e salve as alterações.</p>

            <form class="form-grid" method="post" action="veiculos.edit.process.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars((string) $veiculo['id']) ?>">

                <div class="form-field">
                    <label for="placa">Placa</label>
                    <input id="placa" type="text" name="placa" maxlength="8" value="<?= htmlspecialchars($veiculo['placa']) ?>" required>
                </div>

                <div class="form-field">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" type="text" name="modelo" maxlength="120" value="<?= htmlspecialchars($veiculo['modelo']) ?>" required>
                </div>

                <div class="form-field">
                    <label for="ano">Ano</label>
                    <input id="ano" type="number" name="ano" min="1900" max="<?= (int) date('Y') + 1 ?>" value="<?= htmlspecialchars((string) $veiculo['ano']) ?>" required>
                </div>

                <div class="form-actions">
                    <button class="primary" type="submit">Salvar alterações</button>
                    <a class="button" href="index.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
