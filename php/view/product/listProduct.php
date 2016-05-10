<?php
    include 'navProduct.php';

    require '../../model/Producto.php';
    require '../../controller/productController.php';

    $productController = new productController();
?>

<div class="container">
    <div class="jumbotron well">
        <div class="text-center">
            <h1>Lista productos</h1>
        </div>
        <br>
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($productController->listProduct() as $result) {?>
                <tr>
                    <td><?php echo $result->__get('idproducto')?></td>
                    <td><?php echo $result->__get('descripcion')?></td>
                    <td><?php echo $result->__get('valorUnitario')?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <a class="btn btn-warning" href="updateProduct.php?id=<?php echo $result->__get('idproducto');?>" role="button">Editar</a>
                            <a class="btn btn-danger" href="#" role="button">Eliminar</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
