<?php
include '../db/accesoHMNG.php';
include '../entidades/insumo.php';
include '../entidades/insumodescripcion.php';


class InsumoDAO{
    
    function Agregar_ExistenciaInsumoRegistrado_NoCodigo($idinsumo, $DescripcionCodigoBarras,$DescripcionFechaCaducidad, $NuevaCantidad){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumoDescripcion = new insumodescripcion();
        $insumos->insumoid=$idinsumo;
        $insumoDescripcion->insumodescripcioncodigobarras=$DescripcionCodigoBarras;
        $insumoDescripcion->insumodescripcionfechacaducidad=$DescripcionFechaCaducidad;
        $insumos->insumoexistencia=$NuevaCantidad;
        
 
        $sql = "CALL AgregarExistencia_InsumoRegistrado_NoCodigo("
                .$insumos->insumoid.",'"
                .$insumoDescripcion->insumodescripcioncodigobarras."','"
                .$insumoDescripcion->insumodescripcionfechacaducidad."',"
                .$insumos->insumoexistencia.")";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute() or trigger_error($pdo->error)) {
                return true;                
            } else {
                return false;
            }
        
    }
    
    function Agregar_InsumoNoRegistrado($NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen){
       
        $pdo = AcessoDB::getConnectionPDO(); 
        $insumos = new insumo();
        
        $insumos->insumonombrecomercial=$NombreComercial;
        $insumos->insumonombregenerico=$NombreGenerico;
        $insumos->insumodescripcion=$Descripcion;
        $insumos->insumounidadmedida=$UnidadMedida;
        $insumos->insumocantidadminima=$CantidadMinima;
        $insumos->idalmacen=$idAlmacen;
        

        
        $sql = "CALL Agregar_InsumoNoRegistrado('"
                .$insumos->insumonombrecomercial."', '"
                .$insumos->insumonombregenerico."', '"
                .$insumos->insumodescripcion."','"
                .$insumos->insumounidadmedida."', "
                .$insumos->insumocantidadminima.",0,"
                .$insumos->idalmacen.")";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        
    }
    function AgregarExistencia_InsumoRegistrado_ExisteCod($idinsumo, $NuevaCantidad,$DescripcionCodigoBarras){
        
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumoDescripcion = new insumodescripcion();
        $insumos->insumoid=$idinsumo;
        $insumos->insumoexistencia=$NuevaCantidad;
        $insumoDescripcion->insumodescripcioncodigobarras=$DescripcionCodigoBarras;
        
        $sql = "CALL AgregarExistencia_InsumoRegistrado_ExisteCod ("
                .$insumos->insumoid.","
                .$insumos->insumoexistencia.","
                .$insumoDescripcion->insumodescripcioncodigobarras.")";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    function validarInsumoExiste($nombreInsumo,$DescripcionInsumo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumos->insumonombrecomercial=$nombreInsumo;
        $insumos->insumodescripcion=$DescripcionInsumo;
        
        $sql = 'SELECT idInsumos FROM insumos WHERE '
                . 'InsumosNombreComercial = "'.$insumos->insumonombrecomercial.'" AND'
                . ' InsumosDescripcion like "%'.$insumos->insumodescripcion.'%"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function validarInsumoStock($idinsumo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumos->insumoid=$idinsumo;
       
        
        $sql = 'SELECT * FROM insumos WHERE '
                . 'idInsumos = "'.$insumos->insumoid.'" AND'
                . ' InsumosExistencia > 0';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function validarInsumoPedido($idinsumo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumos->insumoid=$idinsumo;
       
        
        $sql = 'SELECT * FROM detalle_egresos WHERE'
                . ' Insumos_idInsumos = "'.$insumos->insumoid.'"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function eliminarInsumo($idinsumo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumos->insumoid=$idinsumo;
       
        
        $sql = "CALL Eliminainsumo("
                ."".$insumos->insumoid.")";
                
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function actualizarInsumo($idinsumo,$NombreComercial,$NombreGenerico,$Descripcion,$UnidadMedida,$CantidadMinima,$idAlmacen){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumos = new insumo();
        $insumos->insumoid=$idinsumo;
        $insumos->insumonombrecomercial=$NombreComercial;
        $insumos->insumonombregenerico=$NombreGenerico;
        $insumos->insumodescripcion=$Descripcion;
        $insumos->insumounidadmedida=$UnidadMedida;
        $insumos->insumocantidadminima=$CantidadMinima;
        $insumos->idalmacen=$idAlmacen;
        
        $sql = "UPDATE insumos SET "
                . "InsumosNombreComercial = '".$insumos->insumonombrecomercial."'"
                . ",InsumosNombreGenerico = '".$insumos->insumonombregenerico."'"
                . ",InsumosDescripcion = '".$insumos->insumodescripcion."'"
                . ",InsumosUnidadMedida = '".$insumos->insumounidadmedida."'"
                . ",InsumosCantidadMinima = ".$insumos->insumocantidadminima.""
                . ",Almacen_idAlmacen = ".$insumos->idalmacen.""
                . " WHERE idInsumos = ".$insumos->insumoid."";
//        print_r($Ssql);
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function validarServicioCodigoBar($CodigoBarras,$idinsumo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $insumoDescripcion = new insumodescripcion();
        $insumoDescripcion->insumoid=$idinsumo;
        $insumoDescripcion->insumodescripcioncodigobarras=$CodigoBarras;
       
        
        $sql = 'SELECT * FROM insumos_descripcion WHERE '
                . 'Insumos_DescripcionCodigoBarras = '.$insumoDescripcion->insumodescripcioncodigobarras.' and '
                . 'Insumos_idInsumos = '.$insumoDescripcion->insumoid. '';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
}
