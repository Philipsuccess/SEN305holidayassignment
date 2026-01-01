<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<body>

<h1>Blog Posts</h1>

@foreach($posts as $post)
    <h3>
        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
    </h3>
@endforeach

</body>
</html>
