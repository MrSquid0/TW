<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pregunta 1</title>
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
        function pregunta1(){
            echo "¿Tenía conocimientos previos de la materia explicada?";
        }
    ?>
    <form action="pregunta2.php" method="get">
        <label>
            <?php echo pregunta1()?>
            <select name="experiencia">
                <option value="si" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'si') { echo ' selected'; $decision = $_GET['decision'];} ?>>Sí</option>
                <option value="no" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'no') { echo ' selected'; $decision = $_GET['decision'];} ?>>No</option>
                <option value="ns" <?php if(isset($_GET['decision']) && $_GET['decision'] == 'ns') { echo ' selected'; $decision = $_GET['decision'];} ?>>NS/NC</option>
            </select>
        </label>
        <button type="submit" name="boton">Enviar</button>
    </form>

    <?php
    if(isset($_COOKIE)){
        foreach($_COOKIE as $name=>$value) {
            setcookie($name, "", time()-1800);
        }
    }
    ?>
</main>
</body>
</html>