<?php
    include 'navPerson.php';

    require '../../model/Persona.php';
    require '../../controller/personController.php';

    $personController = new personController();
    $Persona = new Persona();
?>

<div class="container">
    <div class="jumbotron well">
        <div class="text-center">
            <h1>Registrar persona</h1>
        </div>
        <br>
        <form class="form-horizontal" method="post" action="newPerson.php">
            <div class="form-group">
                <label for="inputIdentificacion" class="col-sm-2 control-label">Identificación</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputIdentificacion" autocomplete="off" name="txtIdentificacion">
                </div>
            </div>
            <div class="form-group">
                <label for="inputNomApe" class="col-sm-2 control-label">Nombres y Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNomApe" autocomplete="off" name="txtNomApe">
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
                    <input type="text" class="form-control" id="inputDireccion" autocomplete="off" name="txtDireccion">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTelefono" class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTelefono" autocomplete="off" name="txtTelefono">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_REQUEST['txtIdentificacion'])){
        try{
            $Persona->__set('identificacion', $_REQUEST['txtIdentificacion']);
            $Persona->__set('nombresApellidos', $_REQUEST['txtNomApe']);
            $Persona->__set('genero', $_REQUEST['selectGenero']);
            $Persona->__set('direccion', $_REQUEST['txtDireccion']);
            $Persona->__set('telefono', $_REQUEST['txtTelefono']);

            $personController->newPerson($Persona);
            echo 'Persona registrada';
            header('Location: listPerson.php');
        }catch (Exception $e){
            echo 'Error al intentar registrar la persona: ' . $e->getMessage();
        }
    }
?>

</body>
</html>