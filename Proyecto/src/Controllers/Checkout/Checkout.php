<?php

namespace Controllers\Checkout;
use Dao\Dao;
use Controllers\PublicController;

class Checkout extends PublicController{
    public function run():void
    {
        $viewData = array();
        $datoscarrito=array();
        $viewData["login"]=$_SESSION["login"];
     
       
      
        if ($this->isPostBack()) {
            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "test".(time() - 10000000),
                "http://localhost/Proyecto/index.php?page=checkout_error",
                "http://localhost/Proyecto/index.php?page=checkout_accept"
            );
           
            $impuesto =\Dao\Mnt\Carrito::obtenerImpuesto($viewData["login"]["userId"]);

            $r = $impuesto["impuesto"]/ $impuesto["cantidad"];
           
            $datoscarrito=\Dao\Mnt\Carrito::obtenerDatosCarrito($viewData["login"]["userId"]);
            
            foreach($datoscarrito as $tmp){
               
                 $PayPalOrder->addItem($tmp["nombreLibro"], $tmp["Descripcion"], $tmp["libroscodigo"],$tmp["precio"],  $r ,$tmp["cantidad"], "DIGITAL_GOODS");  
            } 
                $response = $PayPalOrder->createOrder();
            $_SESSION["orderid"] = $response[1]->result->id;
            \Utilities\Site::redirectTo($response[0]->href);
            die();
        }

        \Views\Renderer::render("paypal/checkout", $viewData);
    }
}
?>
