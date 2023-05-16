<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Almacenamiento</title>
    <style>
        main
        {
            border: 1px solid black;
            padding: 10px;
            width: 30%;
        }
        .botones
        {
            display: flex;
            margin-top: 10px;
        }
        button
        {
            margin: 3px;
        }
        a
        {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<main>
    <?php
    session_start();

    if (isset($_SESSION['contador'])) {
        // La página se ha recargado
        $_SESSION['contador']++; // Incrementar el contador
    } else {
        // La página se ha cargado por primera vez
        $_SESSION['contador'] = 0; // Establecer el contador en 0
    }

    if (isset($_GET["enviar"]) && !empty($_GET["nombre"])){
        $nuevoNumero = rand();
        if ($_SESSION['contador'] == 1){ //Si primera vez
            $_SESSION['nombre'] = $_GET["nombre"];
        }
        else { //Si resto de veces
            $_SESSION['nombre'] = $_GET["nombre"];
            unset($_SESSION['numeroaleatorio']);
        }
        $_SESSION['numeroaleatorio'][] = $nuevoNumero;
        echo "<p>Bienvenido " . $_SESSION['nombre'] . "</p>";
        echo "<p>El nuevo número es: " . $nuevoNumero . "</p>";
    }

    if (isset($_GET["borrar"])){
        session_unset();
        session_destroy();
        header("Location: almacenamiento.php");
        exit;
    }

    if (isset($_GET['recargar']) && isset($_SESSION['nombre'])){
        echo "<p>Bienvenido " . $_SESSION['nombre'] . "</p>";

        $nuevoNumero = rand();

        $j = 1;
        foreach ($_SESSION['numeroaleatorio'] as $numero){
            echo $j .". ".$numero."<br>";
            $j++;
        }

        $_SESSION['numeroaleatorio'][] = $nuevoNumero;
        echo "<p>El nuevo número es: " . $nuevoNumero . "</p>";
    }
    ?>
    <form action="almacenamiento.php" method="get">
        <label>
            <label>
                Dígame su nombre para comenzar
                <input type="text" name="nombre"/>
            </label>
        </label>
        <div class="botones">
            <button type="submit" name="enviar">Enviar</button>
            <button type="submit" name="borrar">Borrar sesión</button>
            <a href="?recargar=true">Cargar de nuevo</a>
        </div>
    </form>
</main>
</body>
</html>