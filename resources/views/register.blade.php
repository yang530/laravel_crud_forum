<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="{{ asset('css/app_styles.css') }}">
</head>
<body>
    <h1>Create an Account</h1>
    <form class="app_form" id="form_register" action="/registerOK" method="POST">
        @csrf
        <label for="name">username:</label>
        <input id="name" type="text" name="name">
        <label for="password">username:</label>
        <input id="password" type="password" name="password">
        <input type="submit" value="register">
    </form>
</body>
</html>

