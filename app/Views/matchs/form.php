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
                <form action="<?= base_url("tournaments/save") ?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" name='id' value="<?= (isset($match['id'])) ? $match['id'] : '' ?>">
                       
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputLocal">Local</label>
                            <select class="form-select" id="inputLocal">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>


                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputVisitor">Visitante</label>
                            <select class="form-select" id="inputVisitor">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

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