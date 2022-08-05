<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class Libros extends PrivateController
{
    public function run(): void
    {
        $viewData = array();
        // dd(\Dao\Mnt\Libros::obtenerTodoLibros());
        $viewData["items"] = \Dao\Mnt\Libros::obtenerLibros();
        // Verificamos si el usuario está autorizado para utilizar las funciones.
        $viewData["new_enabled"] = true;
        $viewData["edit_enabled"] = true;
        $viewData["delete_enabled"] =true;

        Renderer::render("mnt/libros", $viewData);
    }
}
