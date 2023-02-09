<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-success">Activos</h5>
            <div class="list-group">
                <?php if ($usuarios_activos) : ?>
                    <?php foreach ($usuarios_activos as $u) : ?>
                        <button type="button" class="list-group-item list-group-item-action">
                            <?= $u->nombre_usuario ?> <?= $u->apellido_usuario ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="text-danger">Inactivos</h5>
            <div class="list-group">
                <?php if ($usuarios_inactivos) : ?>
                    <?php foreach ($usuarios_inactivos as $u) : ?>
                        <button type="button" class="list-group-item list-group-item-action">
                            <?= $u->nombre_usuario ?> <?= $u->apellido_usuario ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>