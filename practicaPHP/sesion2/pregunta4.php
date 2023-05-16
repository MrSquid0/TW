<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pregunta 4</title>
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
    function pregunta4(){
        echo "La coordinación entre teoría y prácticas es:";
    }
    ?>

    <form action="pregunta5.php" method="get">
        <label>
            <?php pregunta4();?>
            <select name="coordinacion">
                <option value="mala" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'mala') { echo ' selected'; $decision = $_GET['decision'];} ?>>Mala</option>
                <option value="buena" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'buena') { echo ' selected'; $decision = $_GET['decision'];} ?>>Buena</option>
                <option value="ns" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'ns') { echo ' selected'; $decision = $_GET['decision'];} ?>>NS/NC</option>
            </select>
        </label>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php
    if (isset($_GET['explicaciones'])){
        $decisionCookie3 = $_GET['explicaciones'];
        setcookie("decisionCookie3", $decisionCookie3, time()+1800);
    } else {
        header("Location: pregunta1.php");
        exit;
    }
    ?>
</main>
</body>
</html>