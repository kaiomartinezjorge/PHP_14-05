<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Conversao</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = floatval($_POST["valor"] ?? 0);

            if ($valor <= 0) {
                echo "<h2>Valor invalido</h2>";
                echo "<p>Informe um valor maior que zero para realizar a conversao.</p>";
            } else {
                $inicio = date("m-d-Y", strtotime("-7 days"));
                $fim = date("m-d-Y");

                $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=' .
                "'" . $inicio . "'" . '&@dataFinalCotacao=' . "'" . $fim . "'" . '&$top=100&$format=json&$select=cotacaoCompra';

                $resposta = @file_get_contents($url);
                $dados = json_decode($resposta, true);

                if (!isset($dados["value"]) || count($dados["value"]) == 0) {
                    echo "<h2>Nao foi possivel buscar a cotacao</h2>";
                    echo "<p>Tente novamente mais tarde.</p>";
                } else {
                    $ultima_cotacao = end($dados["value"]);
                    $dolar = $ultima_cotacao["cotacaoCompra"];
                    $result = $valor / $dolar;

                    echo "<h2>Resultado da Conversao</h2>";

                    $padrao_brasil = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
                    $padrao_eua = numfmt_create("en_US", NumberFormatter::CURRENCY);

                    echo "<p><strong>Valor em Reais (R$): </strong>" .
                    numfmt_format_currency($padrao_brasil, $valor, "BRL") . "</p>";
                    echo "<p><strong>Valor em Dolares (US$): </strong>" .
                    numfmt_format_currency($padrao_eua, $result, "USD") . "</p>";
                    echo "<p><strong>Cotacao do Dolar (US$): </strong>" .
                    numfmt_format_currency($padrao_eua, $dolar, "USD") . "</p>";
                }
            }
        } else {
            echo "<h2>Acesse pelo formulario</h2>";
            echo "<p>Por favor, envie um valor usando o formulario.</p>";
        }

        ?>
        <button onclick="window.location.href='index.php'">Voltar ao formulario</button>
    </main>
</body>
</html>
