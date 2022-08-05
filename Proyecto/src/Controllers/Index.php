<?php
/**
 * PHP Version 7.2
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers;

/**
 * Index Controller
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Index extends PublicController
{
    /**
     * Index run method
     *
     * @return void
     */
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
            $_SESSION["newsession"]='Hola';
            $viewData["login"] = $_SESSION["newsession"];
            $viewData["userName"] = 'Libreria';
        }

        if (sizeof($viewData["libros"]) > 0) $viewData["hasLibros"] = true;
     
        \Views\Renderer::render("home/home", $viewData);
    }
}
?>
