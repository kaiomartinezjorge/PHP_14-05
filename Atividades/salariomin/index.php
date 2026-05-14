
<?php $salariomin = 1621; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salario Minimo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="flex-direction: column; gap: 20px;">
    <div class="mostrador">
        <div>
            <form action="index.php" method="post">
                <label for="salario">Salario R$:</label>
                <input
                    type="number"
                    name="salario"
                    min="0"
                    step="0.01"
                    placeholder="Digite seu salario"
                    value="<?= isset($_POST['salario']) ? ($_POST['salario']) : '0' ?>"
                    required
                >
                <h4>Considerando o salario minimo de R$ <?= number_format($salariomin, 2, ',', '.') ?></h4>
                <input type="submit" value="Analisar">
            </form>
        </div>
    </div>

    <?php include "processar.php"; ?>
</body>
</html>
