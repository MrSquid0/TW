<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pregunta 3</title>
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
    function pregunta3(){
        echo "Las explicaciones de teoría son:";
    }
    ?>

    <form action="pregunta4.php" method="get">
        <label>
            <?php pregunta3();?>
            <select name="explicaciones">
                <option value="malas" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'malas') { echo ' selected'; $decision = $_GET['decision'];} ?>>Malas</option>
                <option value="normales" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'normales') { echo ' selected'; $decision = $_GET['decision'];} ?>>Normales</option>
                <option value="buenas" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'buenas') { echo ' selected'; $decision = $_GET['decision'];} ?>>Buenas</option>
                <option value="ns" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'ns') { echo ' selected'; $decision = $_GET['decision'];} ?>>NS/NC</option>
            </select>
        </label>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php
    if (isset($_GET['profundidad'])){
        $decisionCookie2 = $_GET['profundidad'];
        setcookie("decisionCookie2", $decisionCookie2, time()+1800);
    } else {
        header("Location: pregunta1.php");
        exit;
    }
    ?>
</main>
</body>
</html>