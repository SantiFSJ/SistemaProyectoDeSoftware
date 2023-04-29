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
          
                <h3 class="card-title" style="color:white"><?= $title ?> <?=$tournament['name'] ?></h3>
            </div>
            <div class="card-body">
                <?php ?>
                <?php if (!empty($phases) && is_array($phases)) : ?>

                    <?php foreach ($phases as $phase) : ?>
                            <div class="group-box">
                                <div class="card-header fixture-card-header">
                                    <h3 class="card-title" style="color:white"><?= $phase['name'] ?></h3>
                                </div>
                                    <?php if(!empty($phase_groups[$phase['id']]['groups']) && is_array($phase_groups[$phase['id']]['groups'])){ ?>
                                      
                                        <?php foreach ($phase_groups[$phase['id']]['groups'] as $group) : ?>
                                           
                                            <?php if($group['id_phase'] == $phase['id']){ ?>
                                                <div class="group-box-fixture">
                                                <div class="card-header fixture-group-card-header">
                                                
                                                    <h3 class="card-title" style="color:white"><?= $group['name'] ?></h3>
                                                </div>
                                                    <?php foreach ($matches as $match) : ?>
                                                    
                                                        <?php if($match->id_group == $group['id']){ ?>
                                                            
                                                                <div class="match-box-fixture">
                                                                    <div class="match-teams-box-fixture">
                                                                        <div class="match-box-team">
                                                                            <?= $match->name_local?>
                                                                        </div>
                                                                        <div class="match-box-team">
                                                                            <?= $match->name_visitor?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="match-box-fixture-detail">
                                                                       <p class="centered-match-date">
                                                                         <?= date_format(new DateTime($match->date_time), 'd F y') ?>
                                                                        </p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php } ?>

                                        <?php endforeach; ?>
                                                
                                    <?php }else{?>
                                        <?php foreach ($matches as $match) : ?>
                                                    
                                                    <?php if($match->id_phase == $phase['id']){ ?>
                                                        
                                                            <div class="match-box-fixture">
                                                                <div class="match-teams-box-fixture">
                                                                    <div class="match-box-team">
                                                                        <?= $match->name_local?>
                                                                    </div>
                                                                    <div class="match-box-team">
                                                                        <?= $match->name_visitor?>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="match-box-fixture-detail">
                                                                    <?= date_format(new DateTime($match->date_time), 'd F y') ?>
                                                                </div>
                                                            </div>
                                                        
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                    <?php }?>
                                </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h3>Este torneo no tiene fases cargadas</h3>
                <?php endif ?>
            </div>
        </div>
    </div>

    </div>
</body>

</html>