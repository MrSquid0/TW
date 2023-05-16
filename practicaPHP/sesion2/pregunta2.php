<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pregunta 2</title>
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
    function pregunta2(){
        echo "Considera que la profundidad del temario en estos temas es:";
    }
    ?>

    <form action="pregunta3.php" method="get">
        <label>
            <?php pregunta2();?>
            <select name="profundidad">
                <option value="deficiente" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'deficiente') { echo ' selected'; $decision = $_GET['decision'];} ?>>Deficiente</option>
                <option value="adecuada" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'adecuada') { echo ' selected'; $decision = $_GET['decision'];} ?>>Adecuada</option>
                <option value="excesiva" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'excesiva') { echo ' selected'; $decision = $_GET['decision'];} ?>>Excesiva</option>
                <option value="ns" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'ns') { echo ' selected'; $decision = $_GET['decision'];} ?>>NS/NC</option>
            </select>
        </label>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php
        if (isset($_GET['experiencia'])){
            $decisionCookie1 = $_GET['experiencia'];
            setcookie("decisionCookie1", $decisionCookie1, time()+1800);
        } else {
            header("Location: pregunta1.php");
            exit;
        }
    ?>
</main>
</body>
</html>