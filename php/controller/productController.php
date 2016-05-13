<?php

    class productController{


        private $conexion;

        public function __construct(){

            try{
                $this->conexion = new PDO('mysql:host=localhost;dbname=crudgestion', 'root', '');
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (Exception $e){
                die($e->getMessage());
            }
        }

        public function newProduct(Producto $producto){

            try{
                $sql = 'INSERT INTO producto (descripcion, valorUnitario) VALUES (?,? )';

                $this->conexion->prepare($sql)->execute(
                    array(
                        $producto->__get('descripcion'),
                        $producto->__get('valorUnitario')
                    )
                );
            }catch (Exception $e){
                die($e->getMessage());
            }

        }


        public function listProduct(){
            try{
                $dataproduct = array();
                $sql = $this->conexion->prepare("SELECT * FROM producto");
                $sql->execute();

                foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $result) {

                    $producto = new Producto();
                    $producto->__set('idproducto', $result->idproducto);
                    $producto->__set('descripcion', $result->descripcion);
                    $producto->__set('valorUnitario', $result->valorUnitario);

                    $dataproduct[] = $producto;
                }

                return $dataproduct;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
        
        public function updateProduct(Producto $producto){

            try{
                $sql = 'UPDATE producto SET
                                            descripcion   = ?,
                                            valorUnitario = ?
                                            
                                         WHERE idproducto = ?';
                var_dump($producto);
                $this->conexion->prepare($sql)->execute(
                    array(
                        $producto->__get('descripcion'),
                        $producto->__get('valorUnitario'),
                        $producto->__get('idproducto')
                    )
                );
            }catch (Exception $e){
                die('marico: '.$e->getMessage());
            }
        }

        public function search($id){
            try{
                $products = array();
                $sql = $this->conexion->prepare('SELECT * FROM producto WHERE idproducto = ?');
                $sql->execute(array($id));

                foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $result) {

                    $product = new Producto();

                    $product->__set('idproducto', $result->idproducto);
                    $product->__set('descripcion', $result->descripcion);
                    $product->__set('valorUnitario', $result->valorUnitario);

                    $products[] = $product;
                }

                return $products;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }