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
                        <?php  ?>
                        <input type="hidden" name='id_phase' value="<?= (isset($id_phase)) ? $id_phase : '' ?>">
                        <input type="hidden" name='creation_date' value="<?= (isset($creation_date)) ? $creation_date : $bet['creation_date'] ?>">
                        <?php foreach ($matchs as $match) : ?>
                            <div class="form-group">
                                <div class="match-box">
                                    <div class="match-result-box">
                                        <p class=" ">
                                            <div>
                                                <input type="radio" name="forecasts[<?= $match->id ?>]" value="L" <?= $match->result == 'L' ? 'checked' : '' ?>>
                                                <?= $match->name_local ?>
                                            </div>
                                            
                                        </p>

                                        <p>
                                            <input type="radio" name="forecasts[<?= $match->id ?>]" value="E" <?= $match->result == 'E' ? 'checked' : '' ?>> Empate
                                        </p>

                                        <p class="d-flex text-right">
                                            <input type="radio" name="forecasts[<?= $match->id ?>]" value="V" <?= $match->result == 'V' ? 'checked' : '' ?>>

                                            <?= $match->name_visitor ?>
                                        </p>
                                    </div>
                                    <div class="match-details-box">
                                        <p class=" ">
                                            <h class="detail-title">Fecha:</h> <h> <?= date_format(new DateTime($match->date_time), 'd F y')?></h>
                                        </p>
                                        <p class=" ">
                                            <h class="detail-title">Estadio:</h> <h> </h>
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