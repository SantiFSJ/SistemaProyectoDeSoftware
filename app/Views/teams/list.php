<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buenas, este es el listado<h1>


        <?php if (! empty($teams) && is_array($teams)): ?>

            <?php foreach ($teams as $team_item): ?>

                <h3><?= esc($team_item['nombre']) ?></h3>

            <?php endforeach ?>

        <?php else: ?>

    <h3>No hay Equipos Cargados</h3>

<?php endif ?>
</body>
</html>