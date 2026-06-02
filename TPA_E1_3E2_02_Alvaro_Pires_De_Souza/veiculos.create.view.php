<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Veiculo</title>
</head>
<body>

    <h1>Cadastrar novo Veiculo</h1>

    <form method="post" action="veiculos.create.process.php"> 

        <label>Placa:</label> 
        <input type="text" name="placa" required>
        <br><br>

        <label>Modelo:</label>
        <input type="text" name="modelo" required> 
        <br><br>

        <label>Ano:</label>
        <input type="number"  name="ano" required>
        <br><br>

        <button type="submit">Salvar</button>

    </form>

    <br>

    <a href="index.php">Voltar</a> 

</body>
</html>
