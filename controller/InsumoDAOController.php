<?php
include '../model/InsumosDAO.php';

class insumoDAOController {
    
    function Agregar_ExistenciaInsumoRegistrado_NoCodigo($idinsumo, $DescripcionCodigoBarras,$DescripcionFechaCaducidad, $NuevaCantidad){
         $obj = new InsumoDAO();
         return $obj->Agregar_ExistenciaInsumoRegistrado_NoCodigo($idinsumo, $DescripcionCodigoBarras,$DescripcionFechaCaducidad, $NuevaCantidad);
    }
    function Agregar_InsumoNoRegistrado($NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen){
         $obj = new InsumoDAO();
         return $obj->Agregar_InsumoNoRegistrado($NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen);
    }
    function AgregarExistencia_InsumoRegistrado_ExisteCod($idinsumo, $NuevaCantidad,$DescripcionCodigoBarras){
        $obj = new InsumoDAO();
         return $obj->AgregarExistencia_InsumoRegistrado_ExisteCod($idinsumo, $NuevaCantidad,$DescripcionCodigoBarras);
    }
    function validarServicioCodigoBar($CodigoBarras,$idinsumo){
        $obj = new InsumoDAO();
         return $obj->validarServicioCodigoBar($CodigoBarras,$idinsumo);
    }
    function validarInsumoStock($idinsumo){
         $obj = new InsumoDAO();
         return $obj->validarInsumoStock($idinsumo);
    }
    function validarInsumoPedido($idinsumo){
         $obj = new InsumoDAO();
         return $obj->validarInsumoPedido($idinsumo);
    }
    function eliminarInsumo($idinsumo){
         $obj = new InsumoDAO();
         return $obj->eliminarInsumo($idinsumo);
    }
    function actualizarInsumo($idinsumo,$NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen){
         $obj = new InsumoDAO();
         return $obj->actualizarInsumo($idinsumo,$NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen);
    }
    
}