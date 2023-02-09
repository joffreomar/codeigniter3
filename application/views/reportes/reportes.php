<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Reporte de Clientes
        </div>
        <div class="card-body">
            <form method="POST" id="reporte_clientes_form">
                <div class="col-12 row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado_cliente">Estado</label>
                            <select id="estado_cliente" class="form-control form-select" name="estado_cliente">
                                <option value="">-Sleccione-</option>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="posee_cuenta">Posee Cuenta?</label>
                            <select id="posee_cuenta" class="form-control form-select" name="estado_cliente">
                                <option value="">-Sleccione-</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tipo">Tipo de reporte</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo" value="excel" checked> Excel
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo" value="pdf"> Pdf
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success mt-4 col-12" type="submit">Generar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resultados"></div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Reporte de Cuentas
        </div>
        <div class="card-body">
            <form method="POST" id="reporte_cuentas_form">
                <div class="col-12 row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estado_cliente">Estado</label>
                            <select id="estado_cliente" class="form-control form-select" name="estado_cliente">
                                <option value="">-Sleccione-</option>
                                <option value="ACTIVA">ACTIVA</option>
                                <option value="INACTIVA">INACTIVA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo">Tipo de reporte</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo_cuentas" value="excel" checked> Excel
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo_cuentas" value="pdf"> Pdf
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success mt-4 col-12" type="submit">Generar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resultados_cuenta"></div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Reporte de Lecturas
        </div>
        <div class="card-body">
            <form method="POST" id="reporte_lecturas_form">
                <div class="col-12 row">
                    <div class="col-md-3">
                        <label for="fk_id_cuenta">Cliente</label>
                        <select class="form-select" name="fk_id_cuenta" id="fk_id_cuenta">
                            <option selected disabled value="">Seleccione el cliente</option>
                            <?php if ($listadoCuentas) : ?>
                                <?php foreach ($listadoCuentas->result() as $cuenta) : ?>
                                    <option value="<?php echo $cuenta->id_cuenta; ?>">
                                        <?php echo $cuenta->numero_medidor_cuenta; ?> -
                                        <?php echo $cuenta->nombre_cliente; ?>
                                        <?php echo $cuenta->apellido_cliente; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado_lectura">Estado</label>
                            <select id="estado_lectura" class="form-control form-select" name="estado_lectura">
                                <option value="">-Sleccione-</option>
                                <option value="COMPLETADO">COMPLETADO</option>
                                <option value="PENDIENTE">PENDIENTE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tipo">Tipo de reporte</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo_lecturas" value="excel" checked> Excel
                                </label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo_lecturas" value="pdf"> Pdf
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success mt-4 col-12" type="submit">Generar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resultados_cuenta"></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $("#fk_id_cuenta").select2();
</script>
<script type="text/javascript">
    $("#reporte_clientes_form").submit(function(e) {
        e.preventDefault();
        var estado = "todos";
        var posee_cuenta = "todos";
        if ($("#estado_cliente").val()) {
            estado = $("#estado_cliente").val()
        }
        if ($("#posee_cuenta").val()) {
            posee_cuenta = $("#posee_cuenta").val()
        }
        var parametros = estado + "/" + posee_cuenta + "/" + $('input:radio[name=tipo]:checked').val();
        VentanaCentrada("<?= base_url("index.php/reportes/reporteclientes/") ?>" + parametros, 'reporte_de_clientes', '', '1024', '768', 'true');
    });

    $("#reporte_cuentas_form").submit(function(e) {
        e.preventDefault();
        var estado = "todos";
        if ($("#estado_cuenta").val()) {
            estado = $("#estado_cuenta").val()
        }
        var parametros = estado + "/" + $('input:radio[name=tipo_cuentas]:checked').val();
        VentanaCentrada("<?= base_url("index.php/reportes/reportecuentas/") ?>" + parametros, 'reporte_de_cuentas', '', '1024', '768', 'true');
    });

    $("#reporte_lecturas_form").submit(function(e) {
        e.preventDefault();
        var estado = "todos";
        var fk_id_cuenta = "";
        if ($("#estado_lectura").val()) {
            estado = $("#estado_lectura").val()
        }
        fk_id_cuenta = $("#fk_id_cuenta").val();
        var parametros = estado + "/" + $('input:radio[name=tipo_lecturas]:checked').val() + "/" + fk_id_cuenta;
        VentanaCentrada("<?= base_url("index.php/reportes/reportelecturas/") ?>" + parametros, 'reporte_de_lecturas', '', '1024', '768', 'true');
    });

    function VentanaCentrada(theURL, winName, features, myWidth, myHeight, isCenter) { //v3.0
        if (window.screen)
            if (isCenter)
                if (isCenter == "true") {
                    var myLeft = (screen.width - myWidth) / 2;
                    var myTop = (screen.height - myHeight) / 2;
                    features += (features != '') ? ',' : '';
                    features += ',left=' + myLeft + ',top=' + myTop;
                }
        window.open(theURL, winName, features + ((features != '') ? ',' : '') + 'width=' + myWidth + ',height=' + myHeight);
    }
</script>