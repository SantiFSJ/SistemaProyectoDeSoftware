<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">


    <title>Document</title>
</head>
<body class="body">
    <div class="background">
        <div class="container-fluid">
        <div class="card">
                <div class="card-header form-card-header">
                    <h3 class="card-title" style="color:white"><?=$title?></h3>
                </div>
                <div class="card-body">
                <form action="<?= base_url("teams/save")?>" method="post" name="Guardar">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <input type="hidden" name='id' value="<?=(isset($team['id'])) ? $team['id'] : ''?>">
                            <label for="teamName">Nombre del equipo:</label>
                            <input required type="text" class="form-control form-control-border" name="name" id="teamName" placeholder="Ingresa el nombre del equipo" value="<?=(isset($team['name'])) ? $team['name'] : ''?>">
                            <label for="teamConfederation">Confederación:</label>
                            <input required type="text" class="form-control form-control-border" name="confederation" id="teamConfederation" placeholder="Ingresa la confederación del equipo" value="<?=(isset($team['confederation'])) ? $team['confederation'] : ''?>">
                            
                            <label for="teamFifaAbreviature">Abreviatura FIFA:</label>
                            <input required type="text" class="form-control form-control-border" name="fifaAbreviature" id="teamFifaAbreviature" placeholder="Ingresa la abreviatura FIFA del equipo" value="<?=(isset($team['fifa_abreviature'])) ? $team['fifa_abreviature'] : ''?>">
                        
                            <label for="teamDiscipline">Disciplina:</label>
                            <input required  type="text" class="form-control form-control-border" name="category" id="teamDiscipline" placeholder="Ingresa la disciplina del equipo" value="<?=(isset($team['category'])) ? $team['category'] : ''?>">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>     
        </div>
        </div>
    </div>
</body>

</html>