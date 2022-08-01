<?php
namespace Dao\Mnt;

use Dao\Table;

class Carrito extends Table{
    public static function obtenerDatosCarrito($userId)
    {
        $sqlStr = "SELECT c.idcarrito, c.idlibro,l.libroscodigo,ct.categoriaDes, SUBSTR(l.descripcion,1,50) as Descripcion, l.nombreLibro, l.coverart,
        ld.precio, c.cantidad, (ld.precio*c.cantidad)subtotal  
        from carrito C 
        JOIN libros l on c.idlibro=l.idlibros 
        join libro_detalle ld on l.idlibros = ld.idlibro
        left join libros_categorias lc on c.idlibro = lc.idlibros
        left join categorias ct on lc.idCategoria = ct.idCategorias
        where usercod=:fncod;
        ";
        return self::obtenerRegistros($sqlStr, array("fncod" =>$userId));
    }

    public static function obtenerImpuesto($userId)
    {
  
        $sqlStr = "SELECT sum((ld.precio*c.cantidad)*0.15)impuesto, sum(c.cantidad) as cantidad 
        from carrito C 
        JOIN libros l on c.idlibro=l.idlibros 
        join libro_detalle ld on l.idlibros = ld.idlibro
        where usercod=:fncod;";
        return self::obtenerUnRegistro($sqlStr, array("fncod" =>$userId ));

       
    }


    public static function obtenerTotalFact(){
        $sqlSTR= "SELECT sum(subtotal)subtotal, sum(impuesto)impuesto, (sum(subtotal)+sum(impuesto))total from
        (select c.idcarrito, c.idlibro, l.nombreLibro, l.coverart, ld.precio, c.cantidad,(ld.precio*c.cantidad)subtotal, ((ld.precio*c.cantidad)*0.15)impuesto  from carrito C JOIN libros l on c.idlibro=l.idlibros 
        join  libro_detalle ld on l.idlibros = ld.idlibro)carrito";
            
            return self::obtenerRegistros($sqlSTR,array());
    }

    public static function EliminarArticuloCarrito($idcarrito)
    {
        //dd($idlibro);
        $sqlStr = "DELETE from carrito where idcarrito =:idcarrito;";
        return self::executeNonQuery($sqlStr, array(
            "idcarrito" => $idcarrito
        ));
    }

    public static function InsertarDatosCarrito($idlibro, $cantidad){
        $sqlStr ="INSERT INTO `megabook`.`carrito` (`idlibro`, `cantidad`) VALUES (:idlibro, :cantidad);";
        $parametros = array(
            "idlibro" => $idlibro,
            "cantidad" => $cantidad
        );
        return self::executeNonQuery($sqlStr, $parametros);
    }

}