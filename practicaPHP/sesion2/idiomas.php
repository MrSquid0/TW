<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Idiomas</title>
    <style>
        main
        {
            border: 1px solid black;
            padding: 10px;
            width: 30%;
        }
        .seleccion
        {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
<main>

    <?php
        $mensajes = json_decode(file_get_contents('mensajes.json'), true);

    if (isset($_GET["boton"])){
        setcookie("idioma", $_GET['idioma'], time() + 1800);
    }

    if (isset($_GET['idioma'])){
        $idioma = $_GET['idioma'];
    } else {
        if (isset($_COOKIE["idioma"])){
            $idioma = $_COOKIE["idioma"];
        } else {
            $idioma = 'es';
        }
    }
    ?>

    <p> <?php echo $mensajes[$idioma]['Bienvenida']; ?> </p>
    <p> <?php echo $mensajes[$idioma]['Cambio']; ?> </p>

    <div class="seleccion">
        <p><?php echo $mensajes[$idioma]['ElegirIdioma']; ?></p>
        <form action="idiomas.php" method="get">
            <label>
                <select name="idioma">
                    <option value="es" <?php if(isset($_GET['idioma']) && $_GET['idioma'] == 'es') { echo ' selected'; } ?>>Español</option>
                    <option value="en" <?php if(isset($_GET['idioma']) && $_GET['idioma'] == 'en') { echo ' selected'; } ?>>Inglés</option>
                    <option value="fr" <?php if(isset($_GET['idioma']) && $_GET['idioma'] == 'fr') { echo ' selected'; } ?>>Francés</option>
                </select>
            </label>
            <button type="submit" name="boton"><?php echo $mensajes[$idioma]['Aplicar']?></button>
        </form>
    </div>
</main>
</body>
</html>