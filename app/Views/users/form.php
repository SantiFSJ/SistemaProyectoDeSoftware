<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url("users/save")?>" method="post" name="Guardar">
        <?= csrf_field() ?>
        <div class="form-group">
            <input type="hidden" name='id' value="<?=(isset($user['id'])) ? $user['id'] : ''?>">
            <label for="username">Nombre de Usuario:</label>
            <input required type="text" class="form-control" name="username" id="username" placeholder="Ingresa un nombre de usuario" value="<?=(isset($user['username'])) ? $user['username'] : ''?>">
            <label for="password">Contraseña:</label>
            <input required type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña" value="<?=(isset($user['password'])) ? $user['password'] : ''?>">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</body>
</html>