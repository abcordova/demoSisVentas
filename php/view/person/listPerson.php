<?php
    include 'navPerson.php';

    require '../../model/Persona.php';
    require '../../controller/personController.php';

    $personController = new personController();
?>

<div class="container">
    <div class="jumbotron well">
        <div class="text-center">
            <h1>Listado personas</h1>
        </div>
        <br>
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Identificación</th>
                    <th>Nombres y Apellidos</th>
                    <th>Género</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personController->listPerson() as $result) { ?>
                <tr>
                    <td><?php echo $result->__get('idpersona'); ?></td>
                    <td><?php echo $result->__get('identificacion'); ?></td>
                    <td><?php echo $result->__get('nombresApellidos'); ?></td>
                    <td><?php echo $result->__get('genero'); ?></td>
                    <td><?php echo $result->__get('direccion'); ?></td>
                    <td><?php echo $result->__get('telefono'); ?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <a class="btn btn-warning" href="updatePerson.php?id=<?php echo $result->__get('idpersona');?>" role="button">Editar</a>
                            <a class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
