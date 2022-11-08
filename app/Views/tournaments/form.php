<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/myStyles.css">

    <title>Document</title>
</head>
<body class="color-back">
    <div class="container-fluid" style="margin-top: 15px;">
    <div class="card" >
              <div class="card-header" style="background: linear-gradient(90deg, rgba(34,70,195,1) 0%, rgba(152,60,208,1) 100%);">
                <h3 class="card-title" style="color:white"><?=$title?></h3>
              </div>
              <div class="card-body">
              <form action="<?= base_url("tournaments/save")?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" name='id' value="<?=(isset($tournament['id'])) ? $tournament['id'] : ''?>">
                        <label for="tournamentName">Nombre del torneo:</label>
                        <input required type="text" class="form-control form-control-border" name="name" id="tournamentName" placeholder="Ingresa el nombre del torneo" value="<?=(isset($tournament['name'])) ? $tournament['name'] : ''?>">
                        <label for="tournamentStartingDate">Fecha de inicio:</label>
                        <input required type="date" class="form-control form-control-border" name="start_date" id="tournamentStartingDate" placeholder="Ingresa la fecha de inicio del torneo" value="<?=(isset($tournament['start_date'])) ? $tournament['start_date'] : ''?>">
                        <label for="tournamentEndingDate">Fecha de finalización:</label>
                        <input required type="date" class="form-control form-control-border" name="end_date" id="tournamentEndingDate" placeholder="Ingresa la fecha de finalización del torneo" value="<?=(isset($tournament['end_date'])) ? $tournament['end_date'] : ''?>">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
              </div>     
    </div>
    </div>
</body>

</html>