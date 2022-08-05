<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;
use Views\Renderer;

class LibrosDetalles extends PrivateController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\LibroDetalle::obtenerTodoLibroDetalle();
        $viewData["new_enabled"] =true;
        $viewData["edit_enabled"] =true;
        $viewData["delete_enabled"] =true;

        Renderer::render("mnt/librosdetalles", $viewData);
    }
}
