<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f5f7fa;
    margin: 0;
    padding: 30px;
    color: #333;
}

/* Title */
h1 {
    margin-bottom: 20px;
}

/* Form container */
form {
    background-color: white;
    padding: 20px;
    max-width: 600px;
    border-radius: 6px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

/* Labels */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 6px;
}

/* Inputs & textarea */
input[type="text"],
textarea {
    width: 100%;
    padding: 14px 16px; /* generous padding for comfy typing */
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Textarea resizing */
textarea {
    resize: vertical;
    min-height: 120px;
}

/* Checkbox */
input[type="checkbox"] {
    margin-right: 6px;
}

/* Submit button */
button[type="submit"] {
    background-color: #2563eb;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

button[type="submit"]:hover {
    background-color: #1d4ed8;
}

/* Back link */
a {
    display: inline-block;
    margin-top: 15px;
    color: #2563eb;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
</style>
<body>

<h1>Edit Post</h1>

<form method="POST" action="/admin/posts/{{ $post->id }}">
    @csrf
    @method('PUT')

    <label>Title</label><br>
    <input type="text" name="title" value="{{ $post->title }}" required><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="5" required>{{ $post->content }}</textarea><br><br>

    <label>
        <input type="checkbox" name="is_published" {{ $post->is_published ? 'checked' : '' }}>
        Publish
    </label><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="/admin/posts">Back</a>

</body>
</html>