<?php

$shippers = (object) query_getShippers();
$countrys = (object) query_getCountrys();
$markenSites = (object) query_getMarkenSite();
// $ubigeos=json_encode(query_getUbigeo());

print_r(get_current_user_id());

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
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?= $key + 1 ?>" onclick="$('.select-countrys-<?= $key + 1  ?>').select2();"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </td>
                                <td><?= $shipper->direccion ?></td>
                                <td><?= $shipper->site ?></td>

                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
                <!-- modal -->
                <?php foreach ($shippers as $key1 => $ship) {
                    $disabledGlobal = shipper_isUserCreator($ship->id_usuario_created) == true ? "" : "disabled";
                ?>
                    <div class="modal" id="exampleModal<?= $key1 + 1  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Shipper</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreShipper">Nombre: </label>
                                        <input type="text" name="nombreShipper" id="nombreShipper" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId" value="<?= $ship->nombre ?>" <?= $disabledGlobal ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccionShipper">Direccion:</label>
                                        <input type="text" name="direccionShipper" id="direccionShipper" class="form-control" placeholder="Ingrese su direccion" aria-describedby="helpId" value="<?= $ship->direccion ?>" <?= $disabledGlobal ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion2Shipper">Direccion2:</label>
                                        <input type="text" name="direccion2Shipper" id="direccion2Shipper" class="form-control" placeholder="Ingrese su direccion2" aria-describedby="helpId" value="<?= $ship->direccion2 ?>" <?= $disabledGlobal ?>>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zipShipper">Zip:</label>
                                                <input type="number" name="zipShipper" id="zipShipper" class="form-control" placeholder="Ingrese su zip" aria-describedby="helpId" min="0" value="<?= $ship->zip ?>" <?= $disabledGlobal ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="paisShipper" style="display: block;">Pais:</label>
                                                <select class="form-control select-countrys-<?= $key1 + 1 ?>" name="paisShipper" id="paisShipper" style="width: 100% !important;" <?= $disabledGlobal ?>>
                                                    <?php
                                                    foreach ($countrys as $kq => $country) {
                                                    ?>
                                                        <option value="<?= $country->id_pais ?>" <?= $ship->id_country ===  $country->id_pais ? " selected" : "" ?>><?= $country->desc_pais ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shiteShipper">Site:</label>
                                                <select class="form-control" name="shiteShipper" id="shiteShipper" <?= $disabledGlobal ?>>
                                                    <?php foreach ($markenSites as $markenSite) { ?>

                                                        <option value="<?= $markenSite->id_marken_site ?>" <?= $ship->site ===  $markenSite->descripcion ? " selected" : "" ?>>
                                                            <?= $markenSite->descripcion ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label for="ubigeoShipper">Ubigeo:</label>
                                                <select class="form-control" name="ubigeoShipper" id="ubigeoShipper" <?= $disabledGlobal ?>>
                                                    <option><?= query_getUbigeo(null, $ship->id_ubigeo)[0]->descripcion ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-2">
                                        <strong>Creador por: </strong> <?= query_getNameComplete($ship->id_usuario_created)->name ?>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger text-capitalize" data-dismiss="modal">Salir</button>
                                                        
                                    <?php if (shipper_isUserCreator($ship->id_usuario_created)) { ?>
                                        <button type="button" class="btn btn-success text-capitalize">
                                            <i class="fa fa-save mr-1"></i> Guardar</button>
                                    <?php } ?>
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