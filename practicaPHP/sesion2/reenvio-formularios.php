<?php
session_start();

if (isset($_POST['borrar'])) {
    unset($_SESSION['total']);
}

if (!isset($_SESSION['total']) or !isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 0;
    $_SESSION['total'] = 0;
}

//Comprobamos que la donación que enviamos es válida
if (isset($_POST['enviar']) and isset($_POST['donacion'])) {
    $_SESSION['numero']++;
    $_SESSION['total'] += $_POST['donacion'];

    // Usamos header para redirigir el envío y así evitamos el 'double submit'
    header("Location: {$_SERVER['PHP_SELF']}");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Ejemplo</title>
    <style>
        body {
            border: 1px solid black;
            padding: 10px;
            width: 30%;
        }
    </style>
</head>
<body>
<?php
echo "<p>Hasta ahora hay un total de {$_SESSION['numero']} donaciones.</p>";
echo "<p>El importe acumulado es de {$_SESSION['total']} euros.</p>";
if (isset($_POST['donacion']) && is_numeric($_POST['donacion'])) {
    echo "<p>La última donación fue de {$_POST['donacion']} euros</p>";
}
echo form();
?>
</body>
</html>

<?php
function form() {
    return <<<HTML
    <form action="{$_SERVER['PHP_SELF']}" method="post">
        <label>Realizar una nueva donación: <input type="text" name="donacion" size="10"></label>
        <p>
            <input type="submit" name="enviar" value="Enviar">
            <input type="submit" name="borrar" value="Borrar sesión">
        </p>
    </form>\n
    HTML;
}
?>
