<?php
require 'db.connection.php';

$sql = "SELECT id, placa, modelo, ano FROM veiculos ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Veículos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <header class="page-header">
            <div>
                <p class="eyebrow">PHP + PDO + MySQL</p>
                <h1>Veículos cadastrados</h1>
                <p>CRUD acadêmico para cadastro e gerenciamento de veículos.</p>
            </div>
            <a class="button primary" href="veiculos.create.view.php">Novo veículo</a>
        </header>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Ano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$veiculos): ?>
                        <tr>
                            <td colspan="5" class="empty-state">Nenhum veículo cadastrado.</td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($veiculos as $veiculo): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $veiculo['id']) ?></td>
                            <td><?= htmlspecialchars($veiculo['placa']) ?></td>
                            <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
                            <td><?= htmlspecialchars((string) $veiculo['ano']) ?></td>
                            <td class="actions">
                                <a class="button" href="veiculos.edit.view.php?id=<?= urlencode((string) $veiculo['id']) ?>">Editar</a>

                                <form method="post" action="veiculos.delete.process.php" onsubmit="return confirm('Deseja excluir este veículo?');">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars((string) $veiculo['id']) ?>">
                                    <button class="button danger" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
