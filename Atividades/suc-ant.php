<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antecessor e Sucessor</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$mensagem = 'Digite um numero para ver o antecessor e o sucessor.';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST["numero"];
    $sucessor = $numero + 1;
    $antecessor = $numero - 1;

    $mensagem = "Numero escolhido: $numero<br>Sucessor: $sucessor<br>Antecessor: $antecessor";
}
?>
<body>
    <div class="mostrador">
        <div>
            <h3>Antecessor e sucessor</h3>
            <div class="numeros">
                <p><?= $mensagem ?></p>
            </div>
            <form action="" method="post">
                <input type="number" name="numero" placeholder="Digite um numero" required>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</body>
</html>
