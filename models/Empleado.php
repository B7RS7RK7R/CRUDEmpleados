<?php
require_once 'config/conexion.php';

class Empleado {
    private $db;

    public function __construct() {
        $this->db = Conexion::getConexion();
    }

    public function registrar($data) {
        try {
            // Verificar existencia por cédula
            $stmt = $this->db->prepare("SELECT id_empleado FROM empleados WHERE cedula = ?");
            $stmt->execute([$data['cedula']]);
            if ($stmt->fetch()) return 'cedula_existente';

            // Verificar existencia por correo
            $stmt = $this->db->prepare("SELECT id_empleado FROM empleados WHERE email = ?");
            $stmt->execute([$data['email']]);
            if ($stmt->fetch()) return 'email_existente';

            // Insertar nuevo empleado
            $stmt = $this->db->prepare("INSERT INTO empleados 
                (cedula, nombre, apellido, email, telefono, direccion, estado, fecha_registro) 
                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

            $resultado = $stmt->execute([
                $data['cedula'],
                $data['nombre'],
                $data['apellido'],
                $data['email'],
                $data['telefono'],
                $data['direccion'],
                $data['estado']
            ]);

            return $resultado ? 'registro_exitoso' : 'error_registro';

        } catch (PDOException $e) {
            error_log("Error en registro Empleado: " . $e->getMessage());
            return 'error_bd';
        }
    }

    public function obtenerTodos() {
        $stmt = $this->db->prepare("SELECT * FROM empleados ORDER BY fecha_registro DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM empleados WHERE id_empleado = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data) {
        try {
            // Validar cédula duplicada en otro registro
            $stmt = $this->db->prepare("SELECT id_empleado FROM empleados WHERE cedula = ? AND id_empleado != ?");
            $stmt->execute([$data['cedula'], $data['id_empleado']]);
            if ($stmt->fetch()) return 'cedula_existente';

            // Validar email duplicado en otro registro
            $stmt = $this->db->prepare("SELECT id_empleado FROM empleados WHERE email = ? AND id_empleado != ?");
            $stmt->execute([$data['email'], $data['id_empleado']]);
            if ($stmt->fetch()) return 'email_existente';

            // Actualizar datos
            $stmt = $this->db->prepare("UPDATE empleados SET 
                cedula = ?, nombre = ?, apellido = ?, email = ?, 
                telefono = ?, direccion = ?, estado = ?
                WHERE id_empleado = ?");

            return $stmt->execute([
                $data['cedula'],
                $data['nombre'],
                $data['apellido'],
                $data['email'],
                $data['telefono'],
                $data['direccion'],
                $data['estado'],
                $data['id_empleado']
            ]);
        } catch (PDOException $e) {
            error_log("Error al actualizar Empleado: " . $e->getMessage());
            return false;
        }
    }

 
    public function eliminar($id) {
    try {
        $stmt = $this->db->prepare("DELETE FROM empleados WHERE id_empleado = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        error_log("Error al eliminar Empleado: " . $e->getMessage());
        return false;
    }
}

}
