<?php

require 'db.connection.php';

$sql = "SELECT id, placa, modelo, ano FROM Veiculos";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$veiculo = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Veiculos</title> 
</head>
<body>

    <h1>Veiculos cadastrados</h1> 

    <a href="veiculos.create.view.php">Novo veiculo</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th> 
            <th>Placa</th> 
            <th>Modelo</th> 
            <th>Ano</th> 
        </tr>

        <?php foreach ($veiculo as $veiculo): ?>
            <tr>
                <td><?= htmlspecialchars($veiculo['id']) ?></td>
                <td><?= htmlspecialchars($veiculo['placa']) ?></td>
                <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
                <td><?= htmlspecialchars($veiculo['ano']) ?></td>
                <td>
                    <a href="veiculos.edit.view.php?id=<?= $veiculo['id'] ?>">Editar</a>

                    |

                    <a href="veiculos.delete.process.php?id=<?= $veiculo['id'] ?>" onclick="return confirm('Deseja excluir este veiculo ?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>