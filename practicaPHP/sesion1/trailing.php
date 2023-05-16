<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Trailing Path Calculadora</title>
</head>
<body>

<?php
preg_match('#([^/]*php)/(.*)$#',$_SERVER['PHP_SELF'],$coincidencias);
$chunks = (count($coincidencias)>0) ? explode('/',$coincidencias[2]) : [];
/*
if (count($chunks)>0)
    echo '<pre>' . var_export($chunks,true) . '</pre>';
else
    echo'<p>No hay trailing path</p>';*/

$op = count($chunks)>0 ? $chunks[0] : '';
$a = isset($_GET['a']) && is_numeric($_GET['a']) ? $_GET['a'] : NULL;
$b = isset($_GET['b']) && is_numeric($_GET['b']) ? $_GET['b'] : NULL;

if ($op !='' && $a!=NULL && $b!=NULL){
    if ($op=='multiplica'){
        echo "<p>El producto es: ";
        echo $a * $b;
        echo "</p>";
    } else
        echo "<p>No sé hacer la operación.</p>";
} else
    echo "<p>Hay un error en los argumentos</p>";
?>
</body>
</html>