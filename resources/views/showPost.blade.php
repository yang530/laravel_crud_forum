<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post_title}}</title>
    <link rel="stylesheet" href="{{ asset('css/app_styles.css') }}">
</head>
<body>
    <div id="post_content">
        <h1>{{$post_title}}</h1>
        <h2>{{$post_author}}, {{$post_date}}</h2>
        <pre>{{$post_content}}</pre>
    </div>

    <div id="post_comments">
        @foreach ($comments2display as $comment)
            <div id="comment_display">
                <p>poster: {{$comment->getAuthor->name}}, {{$comment["created_at"]}}</p>
                <pre>{{$comment["content"]}}</pre>
            </div>
        @endforeach
    </div>

    <form class="app_form" id="form_comment" action="/commentPost/{{$post_id}}" method="POST">
        @csrf
        <p>Leave a Comment</p>
        <textarea name="content" placeholder="say something..."></textarea>
        <input type="submit" value="submit">
    </form>

    @if (Auth::user()->name == $post_author)
        <form class="app_form" id="form_editPost" action="/editPost/{{$post_id}}" method="POST">
            @csrf
            @method("PUT")
            <p>Edit This Post</p>
            <input type="text" name="title" value="{{$post_title}}">
            <textarea name="content">{{$post_content}}</textarea>
            <input type="submit" value="save changes">
        </form>
        <form class="app_form" id="form_delPost" action="/deletPost/{{$post_id}}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" value="delete post">
        </form>
    @endif

</body>
</html>
