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


</head>
<body>
        <?php if (! empty($teams) && is_array($teams)): ?>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($teams as $team_item): ?>
                    <tr>
                        <td style="border: 1px solid black"><?= esc($team_item['nombre']) ?></td>
                        <td style="border: 1px solid black">
                            <a href="delete/<?= $team_item['id']?>"><i class="fa-solid fa-trash text-danger"></i></a>
                            <a href="edit/<?= $team_item['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>

                <?php endforeach ?>
 
            </table>

        <?php else: ?>

    <h3>No hay Equipos Cargados</h3>

<?php endif ?>
</body>
</html>