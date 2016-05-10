<?php
    include 'navPerson.php';

    require '../../model/Persona.php';
    require '../../controller/personController.php';

    $personController = new personController();
    $Persona = new Persona();

    if (isset($_GET['id'])){

        $idperson = $_GET['id'];

        foreach ($personController->search($idperson) as $result) {


            ?>

            <div class="container">
                <div class="jumbotron well">
                    <div class="text-center">
                        <h1>Actualizar persona</h1>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="updatePerson.php">
                        <div class="form-group">
                            <label for="inputIdentificacion" class="col-sm-2 control-label">Identificación</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputIdentificacion" autocomplete="off"
                                       name="txtIdentificacion" value="<?php echo $result->__get('identificacion');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNomApe" class="col-sm-2 control-label">Nombres y Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNomApe" autocomplete="off"
                                       name="txtNomApe"value="<?php echo $result->__get('nombresApellidos');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectGenero" class="col-sm-2 control-label">Género</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="selectGenero" name="selectGenero">
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDireccion" class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputDireccion" autocomplete="off"
                                       name="txtDireccion" value="<?php echo $result->__get('direccion');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTelefono" class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTelefono" autocomplete="off"
                                       name="txtTelefono" value="<?php echo $result->__get('telefono');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $idperson?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }

    if (isset($_REQUEST['txtIdentificacion'])){
        try{
            $Persona->__set('identificacion', $_REQUEST['txtIdentificacion']);
            $Persona->__set('nombresApellidos', $_REQUEST['txtNomApe']);
            $Persona->__set('genero', $_REQUEST['selectGenero']);
            $Persona->__set('direccion', $_REQUEST['txtDireccion']);
            $Persona->__set('telefono', $_REQUEST['txtTelefono']);
            $Persona->__set('idpersona', $_REQUEST['id']);

            $personController->updatePerson($Persona);

            echo 'Persona Actualizada';
            header('Location: listPerson.php');
        }catch (Exception $e){
            echo 'Error al intentar actualizar: ' . $e->getMessage();
        }
    }
?>