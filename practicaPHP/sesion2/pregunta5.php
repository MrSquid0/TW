<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pregunta 5</title>
    <style>
        main
        {
            border: 1px solid black;
            padding: 10px;
            width: 30%;
        }
    </style>
</head>
<body>
<main>
    <?php
    function pregunta5(){
        echo "La coordinación entre teoría y prácticas es:";
    }
    ?>

    <form action="resultado.php" method="get">
        <label>
            <?php pregunta5();?>
            <select name="sistema">
                <option value="inadecuado" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'inadecuado') { echo ' selected'; $decision = $_GET['decision'];} ?>>Inadecuado</option>
                <option value="adecuado" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'adecuado') { echo ' selected'; $decision = $_GET['decision'];} ?>>Adecuado</option>
                <option value="ns" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'ns') { echo ' selected'; $decision = $_GET['decision'];} ?>>NS/NC</option>
            </select>
        </label>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php
    if (isset($_GET['coordinacion'])){
        $decisionCookie4 = $_GET['coordinacion'];
        setcookie("decisionCookie4", $decisionCookie4, time()+1800);
    } else {
        header("Location: pregunta1.php");
        exit;
    }
    ?>
</main>
</body>
</html>