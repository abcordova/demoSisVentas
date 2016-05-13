<?php

include 'navSale.php';

require '../../model/Persona.php';
require '../../controller/personController.php';

require '../../model/Producto.php';
require '../../controller/productController.php';

$productController = new productController();
$personController = new personController();
?>


<div class="container">
    <div class="jumbotron well">
        <div class="text-center">
            <h1>FACTURA DE VENTA</h1>
        </div>
        <br>
        <div class="text-right">
            <div class="input-group input-group-lg col-sm-offset-10">
                <span class="input-group-addon" id="sizing-addon1">Número:</span>
                <input type="text" class="form-control" aria-describedby="sizing-addon1" disabled value="1">
            </div>
        </div>
        <br>
        <blockquote>
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="selectCliente" class="col-sm-2 control-label">Cliente</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="selectCliente">
                            <?php foreach ($personController->listPerson() as $result) { ?>
                                <option value="<?php echo $result->__get('idpersona'); ?>"><?php echo $result->__get('nombresApellidos'); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtDate" class="col-sm-2 control-label">Fecha</label>
                    <div class="col-sm-10">
                        <input type="date" min="2000-01-02" class="form-control" id="txtDate" placeholder="Password">
                    </div>
                </div>
            </div>
        </blockquote>
        <br>
        <blockquote>
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="selectProducto" class="col-sm-2 control-label">Producto</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="selectProducto">
                            <?php foreach ($productController->listProduct() as $result) { ?>
                                <option title="<?php echo $result->__get('valorUnitario'); ?>" value="<?php echo $result->__get('idproducto'); ?>"><?php echo $result->__get('descripcion'); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtCantidad" class="col-sm-2 control-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="txtCantidad">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-info" id="btnAgregar">Agregar</button>
                    </div>
                </div>
            </div>
        </blockquote>
        <br>
        <br>
        <blockquote>
            <table class="table table-hover" id="tablaDatos">
                <thead>
                    <th>Código producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Valor Total</th>
                </thead>
                <tbody id="recibeDatos">

                </tbody>
            </table>
            <br><br><br>
            <div class="form-inline col-sm-offset-2">
                <div class="form-group">
                    <label for="txtTotalArt">Total artículos</label>
                    <input type="text" class="form-control" id="txtTotalArt" readonly>
                </div>
                <div class="form-group">
                    <label for="txtTotalVenta">Total Venta</label>
                    <input type="text" class="form-control" id="txtTotalVenta" readonly>
                </div>
            </div>

        </blockquote>
        <br>
        <br>
        <blockquote>
            <form action="" method="post" class="col-md-offset-6">
                <button type="submit" class="btn btn-danger btn-lg" id="btnGuardar">GUARDAR</button>
            </form>
        </blockquote>

    </div>
</div>

