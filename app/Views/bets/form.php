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
                    <form action="<?= base_url("bets/save") ?>" method="post" name="Guardar">
                        <?= csrf_field() ?>
                        <?php?>
                        <input type="hidden" name='id_phase' value="<?= (isset($phase['id'])) ? $phase['id'] : '' ?>">
                        <input type="hidden" name='id' value="<?= (isset($bet['id'])) ? $bet['id'] : '' ?>">
                        <input type="hidden" name='creation_date' value="<?= (isset($creation_date)) ? $creation_date : date('Y-m-d') ?>">
                        <?php foreach ($matches as $match) : ?>
                            <?php ?>
                            <div class="form-group">
                                <div class="match-box">
                                    <div class="match-result-box">
                                        <p class=" ">
                                        <div>
                                            <input type="radio" name="forecasts[<?= $match->id ?>][<?= $match->forecast_id ?>]" value="L" <?= $match->expected_result == 'L' ? 'checked' : '' ?>>
                                            <?= $match->local ?>
                                        </div>

                                        </p>

                                        <?php if($phase['id'] == 1){ ?>
                                        <p>
                                            <input type="radio" name="forecasts[<?= $match->id ?>][<?= $match->forecast_id ?>]" value="E" <?= $match->expected_result == 'E' ? 'checked' : '' ?>> Empate
                                        </p>
                                        <?php } ?>
                                        <p class="d-flex text-right">
                                            <input type="radio" name="forecasts[<?= $match->id ?>][<?= $match->forecast_id ?>]" value="V" <?= $match->expected_result == 'V' ? 'checked' : '' ?>>

                                            <?= $match->visitor ?>
                                        </p>
                                    </div>
                                    <div class="match-details-box">
                                        <p class=" ">
                                            <h class="detail-title">Fecha:</h>
                                            <h> <?= date_format(new DateTime($match->date_time), 'd F y') ?></h>
                                        </p>
                                        <p class=" ">
                                            <h class="detail-title">Estadio:</h>
                                            <h> <?= $match->stadium_name ?></h>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary">Guardar Apuesta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>