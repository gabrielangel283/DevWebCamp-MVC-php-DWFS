<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path): bool
{
    return str_contains($_SERVER['PATH_INFO'] ?? '', $path) ? true : false;
}

function is_auth(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function acs_animacion()
{
    $efectos = ['fade-up', 'fade-down', 'fade-left', 'fade-right', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down', 'zoom-out'];

    $efecto = array_rand($efectos, 1);
    echo $efectos[$efecto];
}

// muestra los mensajes
function mostrarNotificacion($codigo)
{
    $mensaje = "";

    switch ($codigo) {
        case 1:
            $mensaje = "Creado correctamemte";
            break;

        case 2:
            $mensaje = "Actualizado correctamemte";
            break;

        case 3:
            $mensaje = "Eliminado correctamemte";
            break;

        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
