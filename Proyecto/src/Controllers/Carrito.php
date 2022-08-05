<?php

namespace Controllers;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;


class Carrito extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=home",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=carrito&mode=DSP",
            "Operación ejecutada Satisfactoriamente!"
            
        );
       
    }
    private function home()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=home",
            "Operación ejecutada Satisfactoriamente!"
        );

        
    }

    public function run(): void
    {
     if(!isset($_SESSION["login"]))
        {
            $viewData1="nologin";
        }
        else {
            $viewData1="login";
        }
      
     if ($viewData1=="nologin"){
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=sec_login",
            "Necesitas iniciar sesion!"
        );
     }
   
     else 
     {
        
 
        $viewData = array(
            "mode" => "",
            "idlibros"=>"",
            "idcarrito"=>"",
            "ventaslib"=>array(),
            "total"=>array(),
            "hasErrors" => false,
            "Errors" => array(),
        );
        
        if($this->isPostBack()){
        
            
        }else {
            if (isset($_GET["mode"])) {
                //dd("hola");
                $viewData["mode"] = $_GET["mode"];
            } else $this->nope($viewData["idlibros"]);
            if (isset($_GET["idlibros"])) $viewData["idlibros"] = $_GET["idlibros"];
            else if ($viewData["mode"] !== "DSP" && $viewData["mode"] !== "DEL") $this->nope();
        }


        if(isset($viewData["mode"])){
        
            $viewData["login"]=$_SESSION["login"];
      
            //dd($viewData);
            $tmpCarrito=array();
            $tmpCarrito=\Dao\Mnt\Carrito::obtenerDatosCarrito($viewData["login"]["userId"]);
            $impuesto =\Dao\Mnt\Carrito::obtenerImpuesto($viewData["login"]["userId"]);
            //dd($tmpCarrito);
            $counter = 0;
            
           
            foreach($tmpCarrito as $tmp){
                $viewData["ventaslib"][$counter]["idcarrito"]= $tmp["idcarrito"];
                $viewData["ventaslib"][$counter]["idlibro"]= $tmp["idlibro"];
                $viewData["ventaslib"][$counter]["nombrelibro"]= $tmp["nombreLibro"];
                $viewData["ventaslib"][$counter]["coverart"]= $tmp["coverart"];
                $viewData["ventaslib"][$counter]["cantidad"]= $tmp["cantidad"];
                $viewData["ventaslib"][$counter]["precio"]= $tmp["precio"];
                $viewData["ventaslib"][$counter]["subtotal"]= $tmp["subtotal"];
                $viewData["ventaslib"][$counter]["impuesto"]=  $impuesto["impuesto"];
                $counter++;
            }
           
         
                $viewData["total"][$counter]["subtotal"]= $impuesto["subtotal"];
                $viewData["total"][$counter]["impuesto"]=  $impuesto["impuesto"];
                $viewData["total"][$counter]["total"]= $impuesto["total"];
                $counter++;
            
            //dd($viewData);
            switch ($viewData["mode"]){
                
                case "DEL":
                    
                    $viewData["idcarrito"] = $_GET["idcarrito"];
                    //dd($viewData);
                    if(\Dao\Mnt\Carrito::EliminarArticuloCarrito($viewData["idcarrito"])){
                        $this->yeah();
                        
                    }else{
                        dd("hay error");
                    }
                case "INS":
                    
                        $viewData["cantidad"]=1;
                
                  
                   if(\Dao\Mnt\Carrito::InsertarDatosCarrito($viewData["idlibros"],$viewData["cantidad"],$viewData["login"]["userId"])){
                    $this->home();
                    }else{
                        dd("hay error");
                    }
            }
        }
        
        Renderer::render("principal/carrito", $viewData);
    }
    }
}