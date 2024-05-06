<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <br><br>

    </form>

    <?php


    include "funcoes.php";

    $x = $_POST["x"];
    $y = $_POST["y"];
    $operacao = $_POST["operacao"];
    $resposta;

    if (isset($_POST['x']) && isset($_POST['y'])) {
        switch ($operacao){
            case ("+"):
                $resposta = $x . " + " . $y . " = " . somar($x, $y);
                break;
            case ("-"):
                $resposta = $x . " - " . $y . " = " . subtrair($x, $y);
                break;
            case ("*"):
                $resposta = $x . " * " . $y . " = " . multiplicar($x, $y);
                break;
            case ("/"):
                $resposta = $x . " / " . $y . " = " . dividir($x, $y);
                break;
            case ("^"):
                $resposta = $x . "^" . $y . " = " . potencia($x, $y);
                break;
            case ("!n"):
                $resposta = "!n" . $x . " = " . fatorial($x);
                break;
        }
    }

    if (isset($resposta)) {
        echo "<label for='resultado'>Resultado:</label>";
        echo "<input type='text' id='resultado' value='$resposta' readonly>";
    }


    ?>
</body>
</html>