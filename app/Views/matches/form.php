<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">

    <title>Document</title>
</head>

<body class="background">
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="card">
            <div class="card-header form-card-header">
                <h3 class="card-title" style="color:white"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url("matches/save") ?>" method="POST" name="Guardar">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <input type="hidden" name='id' value="<?= (isset($match[0]->id)) ? $match[0]->id : '' ?>">

                        <input type="hidden" name='id_phase' value="<?= (isset($id_phase)) ? $id_phase : '' ?>">


                        <?php if ($groups) { ?>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="id_local">Grupo</label>
                                <select class="form-select" name="id_group" id="id_group">
                                    <option  value="<?= (isset($match[0]->id) && isset($match[0]->id_group)) ? esc($match[0]->id_group)  : '' ?>" selected><?= (isset($match[0]->id ) && isset($match[0]->id_group)) ? esc($match[0]->group_name) : 'Un grupo' ?></option>
                                    <?php foreach ($groups as $group_item) : ?>
                                        <option value="<?= esc($group_item['id']) ?>"><?= esc($group_item['name']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php } ?>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_local">Local</label>
                            <select class="form-select" name="id_local" id="id_local">
                                <option  value="<?= isset($match[0]->id) ? esc($match[0]->id_local) : '' ?>" selected><?= isset($match[0]->id) ? esc($match[0]->name_local) : 'Un equipo' ?></option>
                                <?php foreach ($teams as $team_item) : ?>
                                    <option value="<?= esc($team_item['id']) ?>"><?= esc($team_item['name']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_visitor">Visitante</label>
                            <select class="form-select" name="id_visitor" id="id_visitor">
                                <option  value="<?= isset($match[0]->id) ? esc($match[0]->id_visitor) : '' ?>" selected><?= isset($match[0]->id) ? esc($match[0]->name_visitor) : 'Un equipo' ?></option>
                                <?php foreach ($teams as $team_item) : ?>
                                    <option value="<?= esc($team_item['id']) ?>"><?= esc($team_item['name']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <?php if (isset($id)) { ?>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="result" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Local
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="result" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Empate
                                    </label>
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="result" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Visitante
                                    </label>
                                </div>
                            </div>
                        <?php } ?>


                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_local">Estadio</label>
                            <select class="form-select" name="id_stadium" id="id_stadium">
                                <option selected>Un estadio</option>
                                <option value="<?= isset($match[0]->id) ? esc($match[0]->id_stadium) : '' ?>" selected><?= isset($match[0]->id) ? esc($match[0]->name_stadium) : 'Un estadio' ?></option>
                                <?php foreach ($stadiums as $stadium_item) : ?>
                                    <option value="<?= esc($stadium_item['id']) ?>"><?= esc($stadium_item['name']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <label for="dateTime">Fecha del partido:</label>
                        <input required type="date" class="form-control form-control-border" name="date_time" id="date_time" placeholder="Ingresa la fecha del partido" value="<?= (isset($match[0]->date_time)) ? $match[0]->date_time : '' ?>">

                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>