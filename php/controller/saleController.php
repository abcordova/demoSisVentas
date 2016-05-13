<?php

class saleController{
    
    private $conexion;
    
    public function __construct()
    {
        try{
            $this->conexion = new PDO('mysql:host=localhost;dbname=crudgestion', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    
}