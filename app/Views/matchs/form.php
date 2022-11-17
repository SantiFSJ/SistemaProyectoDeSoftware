<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/myStyles.css'); ?>">

    <title>Document</title>
</head>

<body class="background">
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="card">
            <div class="card-header form-card-header">
                <h3 class="card-title" style="color:white"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url("matchs/save") ?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" name='id' value="<?= (isset($match['id'])) ? $match['id'] : '' ?>">

                        <input type="hidden" name='id_phase' value="<?= (isset($id_phase)) ? $id_phase : '' ?>">
                        
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_local">Local</label>
                            <select class="form-select" name="id_local" id="id_local">
                                <option selected>Un equipo</option>
                                <?php foreach ($teams as $team_item) : ?>  
                                <option value="<?= esc($team_item['id']) ?>"><?= esc($team_item['name']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <label class="input-group-text" for="id_visitor">Visitante</label>
                            <select class="form-select" name="id_visitor" id="id_visitor">
                                <option selected>Un equipo</option>
                                <?php foreach ($teams as $team_item) : ?>  
                                <option value="<?= esc($team_item['id']) ?>"><?= esc($team_item['name']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <?php if(isset($id)){ ?>
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

                        <label for="dateTime">Fecha del partido:</label>
                        <input required type="date" class="form-control form-control-border" name="date_time" id="date_time" placeholder="Ingresa la fecha del partido" value="<?= (isset($match['date_time'])) ? $match['date_time'] : '' ?>">

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