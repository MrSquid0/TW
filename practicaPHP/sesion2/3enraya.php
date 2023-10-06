<?php
const COLOR_ROJO = "rojo";
const COLOR_AZUL = "azul";
const MAXIMO_DE_LINEAS = 3;
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>3 en raya</title>
    <style>
        body {
            font-family: helvetica;
        }

        .juego {
            width: 200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .juego > h1 {
            width: 100%;
            background-color: lightgreen;
            text-align: center;
        }

        .juego > .informacion {
            width: 100%;
            background-color: lightgreen;
        }

        .informacion {
            margin: 5px 0;
            padding: 5px;
        }

        .informacion img {
            vertical-align: middle;
        }

        .informacion p {
            text-align: center;
            margin: auto;
        }

        .libre {
            transition: transform .5s ease-in-out;
        }

        .libre:hover {
            transform: scale(1.5);
            cursor: pointer;
        }

        .ganador {
            animation: anim 0.5s infinite linear alternate;
        }

        @keyframes anim {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.5);
            }
        }

        .boton-imagen {
            border: none;
            padding: 0;
            background-color: transparent;
        }
    </style>
</head>
<body>
<section class="juego">
    <h1>3 en raya</h1>
    <section class="tablero">
        <form method="post" action="">
            <table>
                <?php

                if (isset($_POST['limpiar'])) {
                    session_unset();
                    session_destroy();
                    header("Location: 3enraya.php");
                    $_SESSION['turno'] = COLOR_ROJO;
                    exit;
                }

                if (!isset($_SESSION['turno'])) {
                    $_SESSION['turno'] = COLOR_ROJO;
                }
                $resultadoEnviado = false;
                for($i = 0; $i < MAXIMO_DE_LINEAS; $i++){
                    for($j = 0; $j < MAXIMO_DE_LINEAS; $j++){
                        if (isset($_POST["poner${i}${j}"])) {
                            $resultadoEnviado = true;
                            $_SESSION["tablero"][$i][$j] = $_SESSION['turno'];
                        }
                    }
                }
                if (!isset($_SESSION['tablero'])) {
                    $_SESSION['tablero'] = array(
                        array('', '', ''),
                        array('', '', ''),
                        array('', '', '')
                    );
                }

                if (gameOver($_SESSION['tablero'], $_SESSION['turno'])) {
                    echo "<p>¡Enhorabuena, " . $_SESSION['turno'] . "!</p>";
                }
                for($i = 0; $i < MAXIMO_DE_LINEAS; $i++){
                ?>
                <tr>
                    <?php for($j = 0; $j < MAXIMO_DE_LINEAS; $j++){
                    ?>
                        <td>
                            <button type="submit" class="<?php if (isset($_SESSION['tablero']) && $_SESSION['tablero'][$i][$j] != '') {
                                echo "boton-imagen";
                            } else {
                                echo "libre boton-imagen";
                            }
                            if (gameOver($_SESSION['tablero'], $_SESSION['turno'])) {
                                echo " ganador";
                            }
                            ?>" name="<?php echo "poner${i}${j}";?>" <?php if (gameOver($_SESSION['tablero'], $_SESSION['turno'])){echo "disabled";}?>>
                                <?php if ($_SESSION["tablero"][$i][$j] != ''): ?>
                                    <?php if ($_SESSION["tablero"][$i][$j] == COLOR_ROJO) {
                                        echo "<img src='brojo.png' width='50px'/>";
                                    } else if ($_SESSION["tablero"][$i][$j] == COLOR_AZUL) {
                                        echo "<img src='bazul.png' width='50px'/>";
                                    } else {
                                        echo "<img src='bamarillo.png' width='50px'/>";
                                    }
                                    ?>
                                <?php else: ?>
                                    <img src="bamarillo.png" width="50px" alt="bamarillo">
                                <?php endif; ?>
                            </button>
                        </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </form>
    </section>
    <section class="informacion">
        <p>Turno:
            <?php
            if ($resultadoEnviado) {
                if ($_SESSION['turno'] == COLOR_ROJO) {
                    $_SESSION['turno'] = COLOR_AZUL;
                } else {
                    $_SESSION['turno'] = COLOR_ROJO;
                }
            }
            if ($_SESSION['turno'] == COLOR_ROJO) {
                echo "<img src='brojo.png' width='25px'/>";
            } else {
                echo "<img src='bazul.png' width='25px'/>";
            }
            ?>
        </p>
    </section>
    <section class="botones">
        <form method="post" action="">
            <input type="submit" name="limpiar" value="Reiniciar"/>
        </form>
        <?php
        function gameOver($tablero, $jugador)
        {
            // Horizontales
            $i = 0;
            while($i < MAXIMO_DE_LINEAS){
                $line = true;
                $j = 0;
                while($line && $j < MAXIMO_DE_LINEAS){
                    $line = $tablero[$i][$j] == $jugador;
                    $j++;
                }
                if ($line){
                    return true;
                } else {
                    $i++;
                }
            }

            // Verticales
            $j = 0;
            $i = 0;
            while($j < MAXIMO_DE_LINEAS){
                $line = true;
                $i = 0;
                while($line && $i < MAXIMO_DE_LINEAS){
                    $line = $tablero[$i][$j] == $jugador;
                    $i++;
                }
                if ($line){
                    return true;
                } else {
                    $j++;
                }
            }

            // Diagonales
            $i = 0; $j = 0;
            $diagonal = true;
            while($i < MAXIMO_DE_LINEAS){
                $diagonal = $diagonal && $tablero[$j][$i] == $jugador;
                $i++;
                $j++;
            }

            if (!$diagonal){
                $i = 0; $j = MAXIMO_DE_LINEAS - 1;
                $diagonal = true;
                while($i < MAXIMO_DE_LINEAS){
                    $diagonal = $diagonal && $tablero[$i][$j] == $jugador;
                    $i++;
                    $j--;
                }
            }

            if ($diagonal){
                return true;
            }

            return false;
        }
        ?>
    </section>
</section>
</body>
</html>