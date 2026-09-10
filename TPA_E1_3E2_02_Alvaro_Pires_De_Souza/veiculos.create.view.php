<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="container">
        <section class="form-card">
            <p class="eyebrow">Novo registro</p>
            <h1>Cadastrar veículo</h1>
            <p>Preencha os dados abaixo para adicionar um veículo.</p>

            <form class="form-grid" method="post" action="veiculos.create.process.php">
                <div class="form-field">
                    <label for="placa">Placa</label>
                    <input id="placa" type="text" name="placa" maxlength="8" autocomplete="off" required>
                </div>

                <div class="form-field">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" type="text" name="modelo" maxlength="120" required>
                </div>

                <div class="form-field">
                    <label for="ano">Ano</label>
                    <input id="ano" type="number" name="ano" min="1900" max="<?= (int) date('Y') + 1 ?>" required>
                </div>

                <div class="form-actions">
                    <button class="primary" type="submit">Salvar veículo</button>
                    <a class="button" href="index.php">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
