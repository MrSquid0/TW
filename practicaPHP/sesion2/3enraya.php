<?php
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
                if (!isset($_SESSION['turno'])) {
                    $_SESSION['turno'] = "rojo";
                }
                if (!isset($_SESSION['tablero'])) {
                    $_SESSION['tablero'] = array(
                        array('', '', ''),
                        array('', '', ''),
                        array('', '', '')
                    );
                } ?>
                <tr>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner00'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner00">
                            <?php if (isset($_POST['poner00'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner01'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner01">
                            <?php if (isset($_POST['poner01'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner02'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner02">
                            <?php if (isset($_POST['poner02'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                <tr>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner10'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner10">
                            <?php if (isset($_POST['poner10'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner11'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner11">
                            <?php if (isset($_POST['poner11'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner12'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner12">
                            <?php if (isset($_POST['poner12'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                <tr>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner20'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner20">
                            <?php if (isset($_POST['poner20'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner21'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner21">
                            <?php if (isset($_POST['poner21'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="<?php if (isset($_POST['poner22'])) {
                            echo "boton-imagen";
                        } else {
                            echo "libre boton-imagen";
                        } ?>" name="poner22">
                            <?php if (isset($_POST['poner22'])): ?>
                                <?php if ($_SESSION['turno'] == "rojo") {
                                    echo "<img src='brojo.png' width='50px'/>";
                                    $_SESSION['turno'] = "azul";
                                } else {
                                    echo "<img src='bazul.png' width='50px'/>";
                                    $_SESSION['turno'] = "rojo";
                                }
                                ?>
                            <?php else: ?>
                                <img src="bamarillo.png" width="50px" alt="bamarillo">
                            <?php endif; ?>
                        </button>
                    </td>
            </table>
        </form>
    </section>
    <section class="informacion">
        <p>Turno:
            <?php
            if ($_SESSION['turno'] == "rojo") {
                echo "<img src='brojo.png' width='25px'/>";
            } else {
                echo "<img src='bazul.png' width='25px'/>";
            }
            ?>
        </p>
    </section>
    <section class="botones">
        <form method="post" action="">
            <input type="submit" name="limpiar" value="Limpiar"/>
        </form>
        <?php
        function gameOver($tablero, $jugador)
        {
            // Filas
            for ($i = 0; $i < 3; $i++) {
                if ($tablero[$i][0] === $jugador && $tablero[$i][1] === $jugador && $tablero[$i][2] === $jugador) {
                    return true;
                }
            }

            // Columnas
            for ($j = 0; $j < 3; $j++) {
                if ($tablero[0][$j] === $jugador && $tablero[1][$j] === $jugador && $tablero[2][$j] === $jugador) {
                    return true;
                }
            }

            // Diagonales
            if ($tablero[0][0] === $jugador && $tablero[1][1] === $jugador && $tablero[2][2] === $jugador) {
                return true;
            }
            if ($tablero[0][2] === $jugador && $tablero[1][1] === $jugador && $tablero[2][0] === $jugador) {
                return true;
            }

            return false;
        }

        if (isset($_POST['limpiar'])) {
            session_unset();
            session_destroy();
            header("Location: 3enraya.php");
            exit;
        } else {
            {

            }
        }
        ?>
    </section>
</section>
</body>
</html>