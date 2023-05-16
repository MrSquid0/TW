<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
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
    if (isset($_GET['sistema'])){
        $decisionCookie5 = $_GET['sistema'];
        setcookie("decisionCookie5", $decisionCookie5, time()+1800);
        echo "¿Tenía conocimientos previos de la materia explicada? "; echo $_COOKIE['decisionCookie1']; echo "<br>"; echo "<br>";
        echo "Considera que la profundidad del temario en estos temas es: "; echo $_COOKIE['decisionCookie2']; echo "<br>"; echo "<br>";
        echo "Las explicaciones de teoría son: "; echo $_COOKIE['decisionCookie3']; echo "<br>"; echo "<br>";
        echo "La coordinación entre teoría y prácticas es: "; echo $_COOKIE['decisionCookie4']; echo "<br>"; echo "<br>";
        echo "La coordinación entre teoría y prácticas es: "; echo $decisionCookie5; echo "<br>";
    } else {
        header("Location: pregunta1.php");
        exit;
    }
    ?>

</main>
</body>
</html>