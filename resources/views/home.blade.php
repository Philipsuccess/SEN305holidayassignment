<!DOCTYPE html>
<html>
<head>
    <title>Blog Homepage</title>
    
</head>
<style>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
        }

        .post-card {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 6px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }

        .post-card h2 a {
            color: #2563eb;
            text-decoration: none;
        }

        .post-card h2 a:hover {
            text-decoration: underline;
        }

        .post-card p {
            margin-bottom: 10px;
        }

        .post-card a {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        .post-card a:hover {
            text-decoration: underline;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin-top: 15px;
        }
    </style>
</style>
<body>

<h1>Blog Posts</h1>

@foreach($posts as $post)
    <div class="post-card">
        <h2>
            <a href="{{ url('/post/'.$post->slug) }}">{{ $post->title }}</a>
        </h2>
        <p>{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
        <a href="{{ url('/post/'.$post->slug) }}">Read more</a>
        <hr>
    </div>
@endforeach

</body>
</html>