<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<body>

<h1>{{ $post->title }}</h1>

<p>{{ $post->content }}</p>

<hr>

<h3>Comments</h3>

@foreach($post->comments as $comment)
    <p>
        <strong>{{ $comment->author }}</strong><br>
        {{ $comment->content }}
    </p>
@endforeach

</body>
</html>