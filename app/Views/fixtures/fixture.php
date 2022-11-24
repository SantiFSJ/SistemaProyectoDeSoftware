<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('css/myStyles.css'); ?>">

</head>

<body>
    
    <div class="background">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header form-card-header" >
                <h3 class="card-title" style="color:white"><?= $title ?></h3>
            </div>
            <div class="card-body">
                <?php ?>
                <?php if (!empty($phases) && is_array($phases)) : ?>

                    <?php foreach ($phases as $phase) : ?>
                            <div class="group-box">
                                <div class="card-header group-card-header">
                                    <h3 class="card-title" style="color:white"><?= $phase['name'] ?></h3>
                                </div>
                                    <?php if(!empty($groups) && is_array($groups)){ ?>
                                        
                                        <?php foreach ($groups as $group) : ?>
                                           
                                            <?php if($group['id_phase'] == $phase['id']){ ?>
                                                <div class="group-box">
                                                <div class="card-header group-card-header">
                                                    <?php ?>
                                                    <h3 class="card-title" style="color:white"><?= $group['name'] ?></h3>
                                                </div>
                                                    <?php foreach ($matches as $match) : ?>
                                                        <?php ?>
                                                        <?php if($match->id_group == $group['id']){ ?>
                                                            <div class="form-group">
                                                                <div class="match-box">
                                                                    <?php $match->id_group ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php } ?>

                                        <?php endforeach; ?>
                                                
                                    <?php } ?>
                                </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h3>No hay Fases Cargadas</h3>
                <?php endif ?>
            </div>
        </div>
    </div>

    </div>
</body>

</html>