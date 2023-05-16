<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style>
        form {
            background-color: khaki;
            padding: 10px;
        }

        label {
            display: flex;
            margin: 10px;
        }

        .seleccion {
            border: 1px solid black;
            padding: 15px;
            margin: 10px;
        }

        button {
            border: 1px solid grey;
            border-radius: 5px;
        }

        .error {
            font-size: medium;
            color: red;
        }

        .tituloConfirmacion{
            font-size: x-large;
            font-weight: bold;
        }

    </style>
</head>
<body>
<main>
    <?php
    function validarCampos($campo)
    {
        switch ($campo){
            case "nombre":
                if (!empty($_GET['nombre'])){
                    return true;
                }
                break;
            case "email":
                if (isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
                    return true;
                }
                break;
            case "telefono":
                $patronTelefono = "/^\d{9}$/"; //Formato español (9 números)
                if (isset($_GET['telefono'])
                    && preg_match($patronTelefono, $_GET['telefono'])){
                    return true;
                }
                break;
            case "edad":
                if (!empty($_GET["edad"])){
                    return true;
                }
        }
        return false;
    }

    function validarTodosLosCampos(){
        $nombreValido = validarCampos("nombre");
        $emailValido = validarCampos("email");
        $telefonoValido = validarCampos("telefono");
        $edadValida = validarCampos("edad");

        if (($nombreValido && $emailValido &&
            $telefonoValido && $edadValida)){
            return true;
        }
        return false;
    }

    function hayErrores($campo){
        if (isset($_GET['boton']) && !validarCampos($campo)){
            return true;
        }
        return false;
    }

    $patronTelefono = "/^\d{9}$/"; //Formato español (9 números)
    $enviadoCorrectamente = false;
    if (validarTodosLosCampos()){
        echo "<div class='tituloConfirmacion'><p>Los datos se han recibido correctamente</p></div>";
        echo "<div class='mensajeConfirmacion'><p>Hola " . urlencode(htmlentities(strip_tags($_GET["nombre"]))) . ", a continuación se muestra el formulario 
        con los datos recibidos. Se ha deshabilitado la entrada de datos porque se trata únicamente de 
        mostrar información aprovechando el formulario. El botón de envío también se ha deshabilitado.</p></div>";
        $enviadoCorrectamente = true;
    }
    ?>

    <form action="formulario.php" method="get" novalidate>
        <h1>
            Formulario:
        </h1>
        <label class="texto">
            Nombre:
            <input type="text" name="nombre" value ="<?php echo validarCampos("nombre")
             ? $nombre = $_GET['nombre'] : $nombre = ''; ?>"
                   placeholder="Escribe su nombre" <?php if ($enviadoCorrectamente){echo "disabled";}?>/>
        </label>
        <?php
            if (hayErrores("nombre")){
                echo "<span class='error'><p>El nombre no puede estar vacío</p></span>";
            }
        ?>

        <label class="texto">
            Email:
            <input type="email" name="email" value ="<?php echo validarCampos("email")
                ? $email = $_GET['email'] : $email = ''?>" placeholder="Escribe su email"
                <?php if ($enviadoCorrectamente){echo "disabled";}?> />
        </label>

        <?php
        if (hayErrores("email")){
            echo "<span class='error'><p>El email no es correcto</p></span>";
        }
        ?>

        <label class="texto">
            Teléfono:
            <input type="text" name="telefono" value ="<?php echo validarCampos("telefono") ? $telefono = $_GET['telefono']
                : $telefono = '';?>" placeholder="Escribe su teléfono"
                <?php if ($enviadoCorrectamente){echo "disabled";}?>/>
        </label>

        <?php
        if (hayErrores("telefono")){
            echo "<span class='error'><p>El teléfono no es correcto</p></span>";
        }
        ?>

        <div class="seleccion">
            <label>
                <span class="input-label">Edad</span>

                <label>
                    <input type="radio" name="edad" value="menor-12" <?php if (isset($_GET['edad'])){ if(($_GET['edad'] == 'menor-12')) echo "checked";}?>
                    <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Menor de 12 años
                </label>

                <label>
                    <input type="radio" name="edad" value="12-18" <?php if (isset($_GET['edad'])){ if(($_GET['edad'] == '12-18')) echo "checked";}?>
                    <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Entre 12 y 18 años
                </label>

                <label>
                    <input type="radio" name="edad" value="mayor-18" <?php if (isset($_GET['edad'])){ if(($_GET['edad'] == 'mayor-18')) echo "checked";}?>
                    <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Mayor de 18 años
                </label>
            </label>
        </div>

        <?php
        if (hayErrores("edad")){
            echo "<span class='error'><p>Debe elegir un item</p></span>";
        }
        ?>

        <div class="seleccion">
            <label>
                <span>Aficiones</span>
                <label>
                    <input type="checkbox" name="aficiones[]" value="pajaros" <?php if(isset($_GET['aficiones']) &&
                        in_array('pajaros', $_GET['aficiones'])) echo 'checked' ?>
                        <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Los pájaros
                </label>

                <label>
                    <input type="checkbox" name="aficiones[]" value="videojuegos" <?php if(isset($_GET['aficiones']) &&
                        in_array('videojuegos', $_GET['aficiones'])) echo 'checked' ?>
                        <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Los videojuegos
                </label>

                <label>
                    <input type="checkbox" name="aficiones[]" value="botones-camisa" <?php if(isset($_GET['aficiones']) &&
                        in_array('botones-camisa', $_GET['aficiones'])) echo 'checked' ?>
                        <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Coleccionar botones de camisas
                </label>

                <label>
                    <input type="checkbox" name="aficiones[]" value="mirar-techo" <?php if(isset($_GET['aficiones']) &&
                        in_array('mirar-techo', $_GET['aficiones'])) echo 'checked' ?>
                        <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Mirar el techo
                </label>

                <label>
                    <input type="checkbox" name="aficiones[]" value="ensamblador" <?php if(isset($_GET['aficiones']) &&
                        in_array('ensamblador', $_GET['aficiones'])) echo 'checked' ?>
                        <?php if ($enviadoCorrectamente) echo "disabled"; ?>/>
                    Programar en ensamblador
                </label>
            </label>
        </div>

        <button type="submit" name="boton" <?php if ($enviadoCorrectamente) echo "disabled"; ?>>Enviar datos</button>
    </form>
</main>
</body>
</html>