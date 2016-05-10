<?php
    include 'navProduct.php';

    require '../../model/Producto.php';
    require '../../controller/productController.php';

    $producController = new productController();
    $Producto = new Producto();

    if (isset($_GET['id'])) {


        $idproduct = $_GET['id'];

        foreach ($producController->search($idproduct) as $item) {

            ?>

            <div class="container">
                <div class="jumbotron well">
                    <div class="text-center">
                        <h1>Actualizar producto</h1>
                    </div>
                    <br>
                    <form action="updateProduct.php" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputDescripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputDescripcion" autocomplete="off" name="txtDescripcion" value="<?php echo $item->__get('descripcion') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPrecio" class="col-sm-2 control-label">Valor Unitario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPrecio" autocomplete="off"
                                       name="txtPrecio" value="<?php echo $item->__get('valorUnitario') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $idproduct?>">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }

    if (isset($_REQUEST['txtDescripcion'])){
        try{
            $Producto->__set('idproducto', $_REQUEST['id']);
            $Producto->__set('descripcion', $_REQUEST['txtDescripcion']);
            $Producto->__set('valorUnitario', $_REQUEST['txtPrecio']);

            $producController->updateProduct($Producto);

            echo 'Producto actualizado correctamente';
            header('Location: listProduct.php');
        }catch (Exception $e){
            echo 'Error al intentac actualizar el producto: ' . $e->getMessage();
        }
    }
?>