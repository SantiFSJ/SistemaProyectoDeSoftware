<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/myStyles.css'); ?>">

    <title>Document</title>
</head>

<body class="color-back">
    <div class="container-fluid" style="margin-top: 15px;">
        <div class="card">
            <div class="card-header form-card-header">
                <h3 class="card-title" style="color:white"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url("phases/save") ?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" name='id' value="<?= (isset($phase['id'])) ? $phase['id'] : '' ?>">
                        <input type="hidden" name='idTournament' value="<?= (isset($id_tournament)) ? $id_tournament : '' ?>">
                        <label for="phaseName">Nombre de la fase:</label>
                        <input required type="text" class="form-control form-control-border" name="name" id="phaseName" placeholder="Ingresa el nombre de la fase" value="<?= (isset($phase['name'])) ? $phase['name'] : '' ?>">
                        <label for="phaseName">Cantidad de partidos:</label>
                        <input required type="number" class="form-control form-control-border" name="matchAmount" id="matchAmount" placeholder="Ingresa la cantidad de partidos de la fase" value="<?= (isset($phase['match_amount'])) ? $phase['match_amount'] : '' ?>">
                        <label for="phaseName">Cantidad de equipos:</label>
                        <input required type="number" class="form-control form-control-border" name="teamAmount" id="teamAmount" placeholder="Ingresa la cantidad de equipos participantes de la fase" value="<?= (isset($phase['team_amount'])) ? $phase['team_amount'] : '' ?>">
                        <label for="phaseStartingDate">Fecha de inicio:</label>
                        <input required type="date" class="form-control form-control-border" name="start_date" id="phaseStartingDate" placeholder="Ingresa la fecha de inicio de la fase" value="<?= (isset($phase['start_date'])) ? $phase['start_date'] : '' ?>">
                        <label for="tournamentEndingDate">Fecha de finalización:</label>
                        <input required type="date" class="form-control form-control-border" name="end_date" id="phaseEndingDate" placeholder="Ingresa la fecha de finalización de la fase" value="<?= (isset($phase['end_date'])) ? $phase['end_date'] : '' ?>">
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