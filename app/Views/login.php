<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="<?= base_url()?>/public/bootstrap/css/bootstrap.min.css">
</head>
<body>
<form action="autenticar" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario"><br>
        <label for="contrasena">Contraseña:</label>        
        <input type="password" name="contrasena" id="contrasena"><br>
        <input type="submit" name="submit" value="Iniciar sesión">
</form>
  
</body>
</html>



