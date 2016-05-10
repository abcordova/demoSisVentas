<?php
    include 'navProduct.php';

    require '../../model/Producto.php';
    require '../../controller/productController.php';

    $productController = new productController();
    $Producto = new Producto();
?>

<div class="container">
    <div class="jumbotron well">
        <div class="text-center">
            <h1>Registrar producto</h1>
        </div>
        <br>
        <form action="newProduct.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputDescripcion" autocomplete="off" name="txtDescripcion">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPrecio" class="col-sm-2 control-label">Valor Unitario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPrecio" autocomplete="off" name="txtPrecio">
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
    
    if (isset($_REQUEST['txtDescripcion'])){
        try{
            $Producto->__set('descripcion', $_REQUEST['txtDescripcion']);
            $Producto->__set('valorUnitario', $_REQUEST['txtPrecio']);

            $productController->newProduct($Producto);

            echo 'Producto resgistrado correctamente';
            header('Location: listProduct.php');
        }catch (Exception $e){
            echo 'Error al intentar registrar el producto: ' . $e->getMessage();
        }
    }
?>