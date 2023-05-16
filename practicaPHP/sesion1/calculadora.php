<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <style>
        main {
            font-family: Arial;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            border: 2px solid lightgray;
            padding: 5px;
            display: inline-flex;
            align-items: center;
            background-color: lightblue;
        }
        fieldset {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px;
            display: flex;
            flex-direction: column;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<main>
    <h1>Calculadora</h1>
    <form action="" method="GET">
        <label><span>Dato 1</span><input type="text" name="numero1"
                value ="<?php echo isset($_GET['numero1']) && is_numeric($_GET['numero1'])
                    ? $dato1 = $_GET['numero1'] : $dato1 = ''?>" placeholder="Introduce un número"/></label>
        <fieldset>
            <legend>Operación</legend>
            <input type="submit" name="suma" value="+">
            <input type="submit" name="resta" value="-">
            <input type="submit" name="producto" value="*">
            <input type="submit" name="division" value="/">
        </fieldset>
        <label><span>Dato 2</span><input type="text" name="numero2"
               value ="<?php echo isset($_GET['numero2']) && is_numeric($_GET['numero2'])
               ? $dato2 = $_GET['numero2'] : $dato2 = ''?>" placeholder="Introduce un número"/></label>
    </form>
    <?php
        if ((isset($_GET['suma']) || isset($_GET['resta']) || isset($_GET['producto'])
            || isset($_GET['division']))){
            if (($dato1 == '' && $dato2 == '') || (!is_numeric($dato1) && !is_numeric($dato2))){
                echo "<p class='error'>ERROR: El primer dato no es válido</p>";
                echo "<p class='error'>ERROR: El segundo dato no es válido</p>";
            } else if ($dato1 == '' || !is_numeric($dato1)) {
                echo "<p class='error'>ERROR: El primer dato no es válido</p>";
            } else if ($dato2 == '' || !is_numeric($dato2)) {
                echo "<p class='error'>ERROR: El segundo dato no es válido</p>";
            } else {
                if (isset($_GET['suma'])) {
                    $resultado = $dato1 + $dato2;
                    $operacion = "Suma";
                } else if (isset($_GET['resta'])) {
                    $resultado = $dato1 - $dato2;
                    $operacion = "Resta";
                } else if (isset($_GET['producto'])) {
                    $resultado = $dato1 * $dato2;
                    $operacion = "Producto";
                } else if (isset($_GET['division'])) {
                    if ($dato2 == 0) {
                        echo "<p class='error'>ERROR: División por cero</p>";
                    } else {
                        $resultado = $dato1 / $dato2;
                        $operacion = "División";
                    }
                }
                if (isset($_GET['suma']) || isset($_GET['resta']) ||
                    isset($_GET['producto']) || (isset($_GET['division']) && $dato2 != 0)) {
                    echo "<p><span>Operación: $operacion</span></p>";
                    echo "<p><span>Resultado: $resultado</span></p>";
                }
            }
        }
    ?>
</main>
</body>
</html>