<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid" style="margin-top: 15px;">
    <div class="card">
              <div class="card-header" style="background: rgb(34,70,195);
background: linear-gradient(90deg, rgba(34,70,195,1) 0%, rgba(174,45,253,1) 100%);">
                <h3 class="card-title" style="color:white"><?=$title?></h3>
              </div>
              <div class="card-body">
              <form action="<?= base_url("users/save")?>" method="post" name="Guardar">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" name='id' value="<?=(isset($user['id'])) ? $user['id'] : ''?>">
                        <label for="username">Nombre de Usuario:</label>
                        <input required type="text" class="form-control form-control-border" name="username" id="username" placeholder="Ingresa un nombre de usuario" value="<?=(isset($user['username'])) ? $user['username'] : ''?>">
                        <label for="password">Contraseña:</label>
                        <input required type="text" class="form-control form-control-border" name="password" id="password" placeholder="Ingresa tu contraseña" value="<?=(isset($user['password'])) ? $user['password'] : ''?>">

                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
              </div>     
    </div>
    </div>

</body>
</html>