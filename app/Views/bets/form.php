<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/myStyles.css'); ?>">

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
                    <form action="<?= base_url("tournaments/save") ?>" method="post" name="Guardar">
                        <?= csrf_field() ?>
                        <?php foreach ($matches as $match) : ?>
                            <div class="form-group">
                                    <match class=" ">
                                        <?= date_format(new DateTime($match->date_time), 'd F ')   ?>
                                    </match>
                                    <match class=" ">
                                        <input type="radio" name="prono[<?= $match->id ?>][<?= $match->prono_id ?>]" value="L" 
                                        <?= $match->result == 'L' ? 'checked' : ''?>> 

                                        <?= $match->local ?> 
                                    </match>
                                    <match ><input type="radio" name="prono[<?= $match->id ?>][<?= $match->prono_id ?>]" value="E"
                                    <?= $match->prono == 'E' ? 'checked' : ''?> > Empate</match>
                                    
                                    <match class="d-flex text-right">
                                        <input type="radio" name="prono[<?= $match->id ?>][<?= $match->prono_id ?>]" value="V"
                                        <?= $match->result == 'V' ? 'checked' : ''?> > 
                                            
                                        <?= $match->visitor ?>
                                    </match>
                            </div>
                        <?php endforeach; ?>
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