<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de numeros</title>
    <link rel="stylesheet" href="style.css">
</head>
    <?php
    $mensagem = 'Clique no botão para sortear os números.';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeros = [];

        for ($i = 0; $i < 6; $i++) {
            $numeros[] = rand(1, 60);
        }

        $mensagem = implode(' - ', $numeros);
    }
    ?>  
<body>
    <div class="mostrador">
        <div>
            <h3>Sorteador de numeros</h3>
            <div class="numeros">
                <p><?= $mensagem ?></p>
            </div>
            <form action="" method="post">
                <input type="submit" value="Sortear numeros">
            </form>
        </div>
    </div>
</body>

</html>