<?php
$salariomin = 1621;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salario'])) {
    $salario = $_POST['salario'];
    $quantidadeSalarios = intdiv(floor($salario), $salariomin);
    $sobra = $salario - ($quantidadeSalarios * $salariomin);

    echo '<div class="mostrador">';
    echo '    <div>';
    echo '        <h3>Analise do Salario</h3>';
    echo '        <div class="numeros">';
    echo '            <p>Quem recebe um salario de R$ ' . number_format($salario, 2, ',', '.') . '</p>';
    echo '        </div>';
    echo '        <div class="numeros">';
    echo '            <p>Ganha ' . $quantidadeSalarios . ' salario(s) minimo(s)</p>';
    echo '        </div>';
    echo '        <div class="numeros">';
    echo '            <p>E sobra: R$ ' . number_format($sobra, 2, ',', '.') . '</p>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
}
?>
