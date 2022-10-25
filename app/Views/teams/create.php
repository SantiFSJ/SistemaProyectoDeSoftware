<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="save" method="post" name="Guardar">
        <?= csrf_field() ?>
        <div class="form-field">Nombre del Equipo: <input name="name" 
        type="text" 
        value=<?= if(isset($_GET['team'])) ? echo("$_GET['team']") : echo("")?>>
    </div>
        <a><input type="submit" value="Guardar"></a>
    </form>
    
</body>
</html>