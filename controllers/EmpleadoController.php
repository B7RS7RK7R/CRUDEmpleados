<?php
require_once 'models/Empleado.php';

class EmpleadoController {
    private $empleadoModel;

    public function __construct() {
        $this->empleadoModel = new Empleado();
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit();
        }

        
        $empleados = $this->empleadoModel->obtenerTodos();
        
        include 'views/empleado/empleado.php';
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'cedula' => trim($_POST['cedula']),
                'nombre' => trim($_POST['nombre']),
                'apellido' => trim($_POST['apellido']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
                'direccion' => trim($_POST['direccion']),
                'estado' => 'activo'
            ];

            $resultado = $this->empleadoModel->registrar($data);

            switch ($resultado) {
                case 'registro_exitoso':
                    $_SESSION['mensaje'] = 'Empleado registrado exitosamente';
                    $_SESSION['tipo_mensaje'] = 'success';
                    break;
                case 'cedula_existente':
                    $_SESSION['mensaje'] = 'La cédula ya está registrada';
                    $_SESSION['tipo_mensaje'] = 'error';
                    break;
                case 'email_existente':
                    $_SESSION['mensaje'] = 'El email ya está registrado';
                    $_SESSION['tipo_mensaje'] = 'error';
                    break;
                default:
                    $_SESSION['mensaje'] = 'Error al registrar el empleado';
                    $_SESSION['tipo_mensaje'] = 'error';
            }

            header('Location: index.php?c=empleado');
            exit();
        }
    }public function editar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();

        $required = ['id_Empleados', 'cedula', 'nombre', 'apellido', 'email', 'telefono', 'direccion', 'estado'];
        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['mensaje'] = "Error: El campo $field es requerido";
                $_SESSION['tipo_mensaje'] = 'error';
                header('Location: index.php?c=empleado');
                exit();
            }
        }

        $data = [
            'id_Empleados' => (int)$_POST['id_Empleados'], // <- nombre correcto
            'cedula' => trim($_POST['cedula']),
            'nombre' => trim($_POST['nombre']),
            'apellido' => trim($_POST['apellido']),
            'email' => trim($_POST['email']),
            'telefono' => trim($_POST['telefono']),
            'direccion' => trim($_POST['direccion']),
            'estado' => trim($_POST['estado'])
        ];

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['mensaje'] = 'Error: Formato de email no válido';
            $_SESSION['tipo_mensaje'] = 'error';
            header('Location: index.php?c=empleado');
            exit();
        }

        $resultado = $this->empleadoModel->actualizar($data);

        if ($resultado === true) {
            $_SESSION['mensaje'] = 'Empleados actualizado exitosamente';
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al actualizar el empleado';
            $_SESSION['tipo_mensaje'] = 'error';
        }

        header('Location: index.php?c=empleado');
        exit();
    } else {
        header('Location: index.php?c=empleado');
        exit();
    }
}


public function eliminar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        $resultado = $this->empleadoModel->eliminar($id);

        if ($resultado) {
            $_SESSION['mensaje'] = 'Empleados eliminado exitosamente';
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al eliminar el empleado';
            $_SESSION['tipo_mensaje'] = 'error';
        }

        header('Location: index.php?c=empleado');
        exit();
    }
}
    public function obtenerEmpleado() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $empleado = $this->empleadoModel->obtenerPorId($id);
            
            header('Content-Type: application/json');
            echo json_encode($empleado);
            exit();
        }
    }
}