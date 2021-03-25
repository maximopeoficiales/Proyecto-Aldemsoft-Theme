<?php

$shippers = (object) query_getShippers();

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
                        <?php foreach ($shippers as $shipper) {
                        ?>
                            <!-- Modal -->
                            <tr>
                                <td><?= $shipper->nombre ?></td>
                                <td><?= $shipper->direccion ?></td>
                                <td><?= $shipper->site ?></td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
                <div class="modal" id="exampleModal<?= $shipper->id_shipper  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
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