<?php

namespace Utilities;

class Nav {

    public static function setNavContext(){
        $tmpNAVIGATION = array();
        $userID = \Utilities\Security::getUserId();
        if (\Utilities\Security::isAuthorized($userID, "MntUsuarios")) {
     
            $tmpNAVIGATION[] = array(
                "nav_url1" => "index.php?page=mnt_usuarios",
                "nav_label1" => "Usuarios",
                "nav_url2" => "index.php?page=mnt_libros",
                "nav_label2" => "Administrar libros",
                "nav_url3" => "index.php?page=mnt_categorias",
                "nav_label3" => "Administrar categorías",
                "nav_url4" => "index.php?page=mnt_autores",
                "nav_label4" => "Administrar autores",
            );

         
        }
       
        \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
    }
  
    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}
?>

