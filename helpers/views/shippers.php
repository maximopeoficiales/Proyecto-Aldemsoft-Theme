<?php

$shippers = (object) query_getShippers();
$countrys = (object) query_getCountrys();
// print_r(query_getUbigeo());

?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <h5 class="card-header">Shippers</h5>
            <div class="card-body">
                <h5 class="card-title text-center">Lista de Shippers</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <table class="table table-striped table-bordered dt-responsive nowrap" id="table-shippers" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Site</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($shippers as $key => $shipper) {
                        ?>
                            <!-- Modal -->
                            <tr>
                                <td class="d-flex justify-content-between" style="align-items: center !important;">
                                    <span><?= $shipper->nombre ?></span>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?= $key + 1 ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </td>
                                <td><?= $shipper->direccion ?></td>
                                <td><?= $shipper->site ?></td>

                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
                <?php foreach ($shippers as $key1 => $ship) { ?>
                    <div class="modal" id="exampleModal<?= $key1 + 1  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalle de Shipper</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreShipper">Nombre: </label>
                                        <input type="text" name="nombreShipper" id="nombreShipper" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId" value="<?= $ship->nombre ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccionShipper">Direccion:</label>
                                        <input type="text" name="direccionShipper" id="direccionShipper" class="form-control" placeholder="Ingrese su direccion" aria-describedby="helpId" value="<?= $ship->direccion ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion2Shipper">Direccion2:</label>
                                        <input type="text" name="direccion2Shipper" id="direccion2Shipper" class="form-control" placeholder="Ingrese su direccion2" aria-describedby="helpId" value="<?= $ship->direccion2 ?>">
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zipShipper">Zip:</label>
                                                <input type="number" name="zipShipper" id="zipShipper" class="form-control" placeholder="Ingrese su zip" aria-describedby="helpId" min="0" value="<?= $ship->zip ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="paisShipper">Pais:</label>
                                                <select class="form-control" name="paisShipper" id="paisShipper">
                                                    <option selected>FASDF</option>
                                                    <option>ASDF</option>
                                                    <option>ASF</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shiteShipper">Site:</label>
                                                <select class="form-control" name="shiteShipper" id="shiteShipper">
                                                    <option>FASDF</option>
                                                    <option>ASDF</option>
                                                    <option>ASF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="ubigeoShipper">Ubigeo:</label>
                                                <select class="form-control" name="ubigeoShipper" id="ubigeoShipper">
                                                    <option>FASDF</option>
                                                    <option>ASDF</option>
                                                    <option>ASF</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-2">
                                        <strong>Creador por: </strong> lkjaslkjdfk
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">Salir</button>
                                    <button type="button" class="btn btn-success text-capitalize">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="text-center">
                    <button class="btn">Nuevo shipper</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (() => {
        $(document).ready(function() {
            $('#table-shippers').DataTable();
        });
    })()
</script>