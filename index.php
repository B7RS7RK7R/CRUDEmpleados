<?php

$c = $_GET['c'] ?? 'auth';
$a = $_GET['a'] ?? 'login';


$controllerName = ucfirst($c) . 'Controller';
$method = $a;


if ($c === 'empleado') {
    $controllerFile = "controllers/{$controllerName}.php";
    if (!file_exists($controllerFile)) {
        die("Archivo del controlador '$controllerFile' no encontrado.");
    }
    require_once $controllerFile;

    if (!class_exists($controllerName)) {
        die("Controlador '$controllerName' no encontrado.");
    }

    $empleadoController = new $controllerName();

    switch ($a) {
        case 'index':
            $empleadoController->index();
            break;
        case 'registrar':
            $empleadoController->registrar();
            break;
        case 'editar':
            $empleadoController->editar();
            break;
        case 'eliminar':
            $empleadoController->eliminar();
            break;
        case 'obtenerEmpleado':
            $empleadoController->obtenerEmpleado();
            break;
        default:
            $empleadoController->index();
            break;
    }



} else {
    
    $controllerFile = "controllers/{$controllerName}.php";

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                die("Método '$method' no encontrado en el controlador '$controllerName'");
            }
        } else {
            die("Controlador '$controllerName' no encontrado.");
        }
    } else {
        die("Archivo del controlador '$controllerFile' no encontrado.");
    }
}

