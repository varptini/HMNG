<?php
require "../funciones/listas.php";
sleep(1);
$search="";
if(isset($_POST['inputBuscador'])){
    $search = $_POST['inputBuscador'];
}

$objbusqueda = new Listas();
$buscador =  $objbusqueda ->BusquedaCodBar($search);
$contador = count($buscador);
if($contador>0){
  
}
else{
    echo 'false';
}
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

