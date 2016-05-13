<?php
    class personController{

        private $conexion;

        public function __construct()
        {
            try{
                $this->conexion = new PDO('mysql:host=localhost;dbname=crudgestion', 'root', '');
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (Exception $e){
                echo 'Error la intentar conectarse a la Base de datos: ' . $e->getMessage();
            }
        }


        public function newPerson(Persona $data){
            try{
                $sql = 'INSERT INTO persona(identificacion, nombresApellidos, genero, direccion, telefono) VALUES (?,?,?,?,?)';

                $this->conexion->prepare($sql)->execute(
                    array(
                        $data->__get('identificacion'),
                        $data->__get('nombresApellidos'),
                        $data->__get('genero'),
                        $data->__get('direccion'),
                        $data->__get('telefono')
                    )
                );
            }catch (Exception $e){
                die($e->getMessage());
            }
        }

        public function listPerson(){
            try{
                $datapersons = array();
                $sql = $this->conexion->prepare("SELECT * FROM persona");
                $sql->execute();
                foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $result){

                    $persona = new Persona();
                    $persona->__set('idpersona', $result->idpersona);
                    $persona->__set('identificacion', $result->identificacion);
                    $persona->__set('nombresApellidos', $result->nombresApellidos);
                    $persona->__set('genero', $result->genero);
                    $persona->__set('direccion', $result->direccion);
                    $persona->__set('telefono', $result->telefono);

                    $datapersons[] = $persona;
                }

                return $datapersons;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }

        public function updatePerson(Persona $obtienePerson){
            try{
                $sql = 'UPDATE persona SET 
                                          identificacion   = ?,
                                          nombresApellidos = ?,
                                          genero           = ?,
                                          direccion        = ?,
                                          telefono         = ?
                                          
                                    WHERE idpersona        = ?';
                $this->conexion->prepare($sql)->execute(
                    array(
                        $obtienePerson->__get('identificacion'),
                        $obtienePerson->__get('nombresApellidos'),
                        $obtienePerson->__get('genero'),
                        $obtienePerson->__get('direccion'),
                        $obtienePerson->__get('telefono'),
                        $obtienePerson->__get('idpersona')
                    )
                );
            }catch (Exception $e){
                die($e->getMessage());
            }
        }

        public function search($id){
            try{
                $persons = array();
                $sql = $this->conexion->prepare('SELECT * FROM persona WHERE idpersona = ?');
                $sql->execute(array($id));

                foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $result) {

                    $person = new Persona();

                    $person->__set('idpersona', $result->idpersona);
                    $person->__set('identificacion', $result->identificacion);
                    $person->__set('nombresApellidos', $result->nombresApellidos);
                    $person->__set('genero', $result->genero);
                    $person->__set('direccion', $result->direccion);
                    $person->__set('telefono', $result->telefono);
                    $persons[] = $person;
                }

                return $persons;
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }