<!DOCTYPE html>
<html>
<head>
    <title>Admin - Posts</title>
</head>
<style>
    * {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f5f7fa;
    margin: 0;
    padding: 30px;
    color: #333;
}

/* Headings */
h1 {
    margin-bottom: 10px;
}

/* Top actions */
a {
    color: #2563eb;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

/* Logout button */
form[action="/logout"] {
    display: inline-block;
    margin-top: 10px;
}

form[action="/logout"] button {
    background-color: #ef4444;
    color: white;
    border: none;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 4px;
}

form[action="/logout"] button:hover {
    background-color: #dc2626;
}

/* Divider */
hr {
    margin: 20px 0;
    border: none;
    border-top: 1px solid #ddd;
}

/* Table styling */
table {
    width: 100%;
    max-width: 700px;
    border-collapse: collapse;
    background-color: white;
    border-radius: 6px;
    overflow: hidden;
}

th {
    background-color: #1f2937;
    color: white;
    text-align: left;
    padding: 10px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #e5e7eb;
}

tr:last-child td {
    border-bottom: none;
}

/* Action buttons */
td a {
    margin-right: 10px;
}

td form {
    display: inline;
}

td form button {
    background-color: #ef4444;
    color: white;
    border: none;
    padding: 4px 10px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 14px;
}

td form button:hover {
    background-color: #dc2626;
}

/* Published status */
td:nth-child(2) {
    font-weight: bold;
}

</style>
<body>

<h1>All Posts</h1>

<a href="/admin/posts/create">Create New Post</a>

<form method="POST" action="/logout" style="margin-top:10px;">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>Title</th>
        <th>Published</th>
        <th>Actions</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
        <td>
            <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>

            <form method="POST" action="/admin/posts/{{ $post->id }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>