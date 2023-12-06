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
                    <form action="<?= base_url("challenge/save") ?>" method="post" name="Guardar">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <div class="left-form-box">
                                <input type="hidden" name='id' value="<?= (isset($challenge['id'])) ? $challenge['id'] : '' ?>">
                                <input type="hidden" name='idTournament' value="<?= (isset($id_tournament)) ? $id_tournament : $phase['id_tournament'] ?>">
                                <label for="phaseName">Nombre del desafío:</label>
                                <input required type="text" class="form-control form-control-border" name="name" id="name" placeholder="Ingresa el nombre para este desafío" value="<?= (isset($phase['name'])) ? $phase['name'] : '' ?>">
                            </div>
                            <div class="right-form-box">
                                <div class="user-list-box">
                                    <div style="width:85%;text-align:center">
                                        <label > 
                                            Invita a tus amigos!!
                                        </label>
                                    </div>
                                    <?php foreach ($users as $user) : ?>
                                        <div class="user-row" onclick="toggleCheckbox('<?= $user->id ?>')">
                                            <div style="float:left; width:30%; text-align:center;">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" name="users_to_invite[<?= $user->id ?>]" type="checkbox" value="1" id="<?= $user->id ?>" onclick="event.stopPropagation()">
                                                    <label class="custom-control-label" for="<?= $user->id ?>"></label>
                                                </div>
                                            </div> 
                                            <div style="float:right; width:60%; text-align:center;">
                                                <label for="<?= $user->id ?>">
                                                    <?= $user->username ?>
                                                </label>
                                            </div> 
                                        </div>
                                    <?php endforeach; ?>


                                </div>
                            </div>
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

<script>
    function toggleCheckbox(id) {
        // Obtener el checkbox asociado al ID
        var checkbox = document.getElementById(id);

        // Cambiar el estado del checkbox
        checkbox.checked = !checkbox.checked;
    }
</script>