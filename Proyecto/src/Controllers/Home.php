<?php

namespace Controllers;

use Controllers\PublicController;
use Views\Renderer;

class Home extends PublicController
{
    public function run(): void
    {
        $viewData = array(
            "libros" => array(),
            "categorias" => array(),
            "login" =>array(),
            "userName" => "", 
            "hasLibros" => false
        );
        $viewData["libros"] = \Dao\Mnt\Libros::obtenerTodoLibros();
        $viewData["categorias"] = \Dao\Mnt\Categorias::obtenerCategorias("alf");
        
        if(isset($_SESSION["login"])){
            $viewData["login"] = $_SESSION["login"];
            $viewData["userName"] = $viewData["login"]["userName"];
           
        }else {
            $_SESSION["newsession"]='no login';
            $viewData["login"] = $_SESSION["newsession"];
            $viewData["userName"] = 'Bienvenido'; 
        }
        //unset($_SESSION["login"]);

        if (sizeof($viewData["libros"]) > 0) $viewData["hasLibros"] = true;
     
        Renderer::render("home/home", $viewData);
    }
}
