<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_Landing</title>
    <link rel="stylesheet" href="{{ asset('css/app_styles.css') }}">
</head>
<body>
    <h1>WELCOME TO CRUD FORUM</h1>
    <h2>Please login...</h2>
    <form class="app_form" id="form_login" action="/user_dashboard" method="POST">
        @csrf
        <label for="name">username:</label>
        <input id="name" type="text" name="name">
        <label for="password">password:</label>
        <input id="password" type="password" name="password">
        <a href="/register">create an account</a>
        <input type="submit" value="login">
    </form>
</body>
</html>

