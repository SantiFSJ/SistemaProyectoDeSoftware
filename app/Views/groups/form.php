<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">

    <title>Document</title>
</head>

<body>
    <div class="background">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header form-card-header">
                    <h3 class="card-title" style="color:white"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url("groups/save") ?>" method="post" name="Guardar">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <input type="hidden" name='id' value="<?= (isset($group['id'])) ? $group['id'] : '' ?>">
                            <input type="hidden" name='id_phase' value="<?= (isset($group['id_phase'])) ? $group['id_phase'] : '' ?>">
                            <label for="phaseName">Nombre del grupo:</label>
                            <input required type="text" class="form-control form-control-border" name="name" id="groupName" placeholder="Ingresa el nombre del grupo" value="<?= (isset($group['name'])) ? $group['name'] : '' ?>">
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>