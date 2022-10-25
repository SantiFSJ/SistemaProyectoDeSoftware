<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?= base_url("teams/save") ?>" method="post" name="Guardar">
        <?= csrf_field() ?>
        <div class="form-group">
            <input type="hidden" name='id' value="<?= (isset($team['id'])) ? $team['id'] : '' ?>">
            <label for="teamName">Nombre del equipo:</label>
            <input required type="text" class="form-control" name="name" id="teamName" placeholder="Ingresa el nombre del equipo" value="<?= (isset($team['nombre'])) ? $team['nombre'] : '' ?>">
            <label for="teamConfederation">Confederación:</label>
            <input required type="text" class="form-control" name="confederation" id="teamConfederation" placeholder="Ingresa la confederación del equipo" value="<?= (isset($team['confederacion'])) ? $team['confederacion'] : '' ?>">
            <label for="teamFifaAbreviature">Abreviatura FIFA:</label>
            <input required type="text" class="form-control" name="fifaAbreviature" id="teamFifaAbreviature" placeholder="Ingresa la abreviatura FIFA del equipo" value="<?= (isset($team['abreviatura_fifa'])) ? $team['abreviatura_fifa'] : '' ?>">
            <label for="teamCategory">Categoria:</label>
            <input required type="text" class="form-control" name="category" id="teamCategory" placeholder="Ingresa la categoria del equipo" value="<?= (isset($team['categoria'])) ? $team['categoria'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>

</html>