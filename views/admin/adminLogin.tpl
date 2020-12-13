<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{$TemplateWebPath}css/main.css" type="text/css">
    <script type="text/javascript" src="/www/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="/www/templates/admin/js/admin.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>{$pageTitle}</title>
</head>

<body class="container">

        <div class="form-group">
            <label for="login">Логин</label>
            <input type="login" class="form-control" id="login" placeholder="Введите Логин">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Пароль">
        </div>
        <button type="submit" class="btn btn-primary" onclick="loginadminn();">Войти</button>
</body>

</html>