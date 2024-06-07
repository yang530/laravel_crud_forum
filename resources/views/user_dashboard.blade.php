<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app_styles.css') }}">
</head>
<body>
    <h1>You Are Loggedin As: {{$username}}</h1>
    <h2>This Is Your User Dashboard</h2>

    <form class="app_form" id="form_logout" action="/logout" method="POST">
        @csrf
        <input type="submit" value="logout">
    </form>

    <div>
        @foreach ($posts2display as $post)
            <div id="post_display">
                <strong><p><a href="/showPost/{{$post["id"]}}">{{$post["title"]}}</a></p></strong>
                <p>poster: {{$post->getAuthor->name}}, {{$post["created_at"]}}</p></strong>
            </div>
        @endforeach
    </div>

    <form class="app_form" id="form_creatPost" action="/create_post" method="POST">
        @csrf
        <p>use this form to post something...</p>
        <input type="text" name="title" placeholder="post title goes here...">
        <textarea name="content" placeholder="post content goes here..."></textarea>
        <input type="submit" value="create post">
    </form>
</body>
</html>


