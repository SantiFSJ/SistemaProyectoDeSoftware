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
                <?php if (!empty($phases) && is_array($phases)) : ?>
                    <?php foreach ($phases as $phase) : ?>
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