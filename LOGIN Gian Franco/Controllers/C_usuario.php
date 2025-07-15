<?php
require_once __DIR__ . '/../models/Usuario.php';

class C_usuario {
    public function obtenerUsuarios() {
        return Usuario::obtenerTodos();
    }
}
