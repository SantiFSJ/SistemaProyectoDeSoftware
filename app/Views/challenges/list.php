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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/myStyles.css'); ?>">
</head>

<body>
    <div class="background">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header form-card-header">
                    <h3 class="card-title" style="color:white"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <?php if (!empty($createdChallenges)) : ?>
                        <table class="table">
                            <caption>Desafíos creados</caption>
                            <thead>
                                <tr>Desafíos creados</tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Torneo</th>
                                    <?php
                                    if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                        <th>Acciones</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($createdChallenges as $challenge) : ?>
                                    <tr>
                                        <td><?= esc($challenge->name) ?></td>
                                        <td><?= esc($challenge->tournament_name) ?></td>
                                        <td>
                                            <a href="<?= base_url() . "/challenges/edit/" . $challenge->id  ?>" title="Modificar"><button type="button" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                            <a href="<?= base_url('/challenges/delete/' . $challenge->id) ?>   " title="Eliminar"><button type="button" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash "></i></button></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h5>No se encontraron desafíos creados por usted</h5>
                    <?php endif;
                    if (!empty($acceptedChallenges)) : ?>
                        <table class="table">
                            <caption>Desafíos aceptados</caption>
                            <thead>
                                <tr>Desafíos aceptados</tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Torneo</th>
                                    <th>Usuario emisor de la invitación</th>
                                    <?php
                                    if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                        <th>Acciones</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($acceptedChallenges as $challenge) : ?>
                                    <tr>
                                        <td><?= esc($challenge->name) ?></td>
                                        <td><?= esc($challenge->tournament_name) ?></td>
                                        <td><?= esc($challenge->username) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h5>No se encontraron desafíos aceptados por usted</h5>
                    <?php endif;
                    if (!empty($rejectedChallenges)) : ?>
                        <table class="table">
                            <caption>Desafíos rechazados</caption>
                            <thead>
                                <tr>Desafíos rechazados</tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Torneo</th>
                                    <th>Usuario emisor de la invitación</th>
                                    <?php
                                    if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                        <th>Acciones</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rejectedChallenges as $challenge) : ?>
                                    <tr>
                                        <td><?= esc($challenge->name) ?></td>
                                        <td><?= esc($challenge->tournament_name) ?></td>
                                        <td><?= esc($challenge->username) ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h5>No se encontraron desafíos rechazados por usted</h5>
                    <?php endif;
                    if (!empty($pendingChallenges)) : ?>
                        <table class="table">
                            <caption>Desafíos pendientes</caption>
                            <thead>
                                <tr>Desafíos pendientes</tr>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Torneo</th>
                                    <th>Usuario emisor de la invitación</th>
                                    <?php
                                    if (session()->id_role != 2 and (isset(session()->id_role))) { ?>
                                        <th>Acciones</th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pendingChallenges as $challenge) : ?>
                                    <tr>
                                        <td><?= esc($challenge->name) ?></td>
                                        <td><?= esc($challenge->tournament_name) ?></td>
                                        <td><?= esc($challenge->username) ?></td>
                                        <td>
                                            <!-- TODO: sacar la invitación del header -->
                                            <a href="<?= base_url() . "/invites/accept/" . $challenge->invite_id . "/" . session()->id  ?>" title="Aceptar invitación"><button type="button" class="btn btn-success accept-button"><i class="fa fa-check fa-lg" aria-hidden="true"></i></button></a>
                                            <a href="<?= base_url('/invites/reject/' .  $challenge->invite_id . "/" . session()->id) ?>   " title="Eliminar"><button type="button" class="btn btn-danger reject-button"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h5>No se encontraron desafíos pendientes de respuesta</h5>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</body>

</html>