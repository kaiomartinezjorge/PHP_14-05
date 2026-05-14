<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Reais para Dolares</h1>
        <p>Digite um valor em reais para converter usando a cotacao atual do Banco Central.</p>

        <form action="processar.php" method="post">
            <label for="valor">Valor em reais (R$)</label>
            <input type="number" name="valor" id="valor" step="0.01" min="0.01" placeholder="Ex: 100.00" required>

            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
        </form>
    </main>
</body>
</html>
