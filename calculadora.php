<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Calculadora: </h1>

    <form action="calculadora.php" method='POST'>
        <label for="">Numero 1: </label>
        <input type="text" name="x" id="">

        <label for=""></label>
        <select name="operacao" id="operacao">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>
            <option value="!n">!n</option>
        </select>

        <label for="">Numero 2: </label>
        <input type="text" name="y" id="">

        <input type="submit" value="Calcular">
        <button type="submit" name="limpar_historico" value="limpar">Limpar Histórico</button>
</form>

    </form>

    <?php
    session_start();

    include "funcoes.php";

    if (isset($_POST['x']) && isset($_POST['y']) && isset($_POST['operacao'])) {
        $x = $_POST["x"];
        $y = $_POST["y"];
        $operacao = $_POST["operacao"];
        $resposta;

        switch ($operacao) {
            case "+":
                $resposta = $x . " + " . $y . " = " . somar($x, $y);
                break;
            case "-":
                $resposta = $x . " - " . $y . " = " . subtrair($x, $y);
                break;
            case "*":
                $resposta = $x . " * " . $y . " = " . multiplicar($x, $y);
                break;
            case "/":
                $resposta = $x . " / " . $y . " = " . dividir($x, $y);
                break;
            case "^":
                $resposta = $x . "^" . $y . " = " . potencia($x, $y);
                break;
            case "!n":
                $resposta = "!n" . $x . " = " . fatorial($x);
                break;
        }

        if (isset($resposta)) {
            echo "<label for='resultado'>Resultado:</label>";
            echo "<input type='text' id='resultado' value='$resposta' readonly>";
            echo '<form action="calculadora.php" method="POST">';
            echo "<input type='hidden' name='resultado' value='$resposta'>";
            echo "<button class='botao-container' type='submit' name='salvar' value='salvar'>Salvar</button>";
            echo "<button class='botao-container' type='submit' name='resgatar' value='resgatar'>Resgatar</button>";
            echo '</form>';
            echo '<form action="calculadora.php" method="POST">';
            echo "<input type='hidden' name='resultado' value='$resposta'>";
            echo "<button class='botao-container' type='submit' name='memoria' value='memoria'>M</button>";
            echo '</form>';

            if (!isset($_SESSION['historico'])) {
                $_SESSION['historico'] = array();
            }
            array_push($_SESSION['historico'], $resposta);
        }
    }

    if (isset($_POST['memoria'])){
        if (!isset($_SESSION['memoriaSalva'])){
            $_SESSION['memoriaSalva'] = $_POST['resultado'];

        }
        else{
            $resposta = $_SESSION['memoriaSalva'];
            echo "<label for='memoriaSalva'>Memoria Salva:</label>";
            echo "<input type='text' id='memoriaSalva' value='$resposta' readonly>";
            $_SESSION['memoriaSalva'] = null;
        }
    }

    if (isset($_POST['salvar'])) {
        $_SESSION['resultado_salvo'] = $_POST['resultado'];
    }
    
    if (isset($_POST['resgatar']) && isset($_SESSION['resultado_salvo'])) {
        $resposta = $_SESSION['resultado_salvo'];
        echo "<label for='resultado_salvo'>Resultado Salvo:</label>";
        echo "<input type='text' id='resultado_salvo' value='$resposta' readonly>";
    }
    
    if(isset($_POST['limpar_historico'])) {
        unset($_SESSION['historico']);
    }

    if (isset($_SESSION['historico'])) {
        echo "<h2>Histórico de Resultados:</h2>";
        foreach ($_SESSION['historico'] as $resultado) {
            echo "<p>$resultado</p>";
        }
    }
    
    


    ?>
</body>
</html>
