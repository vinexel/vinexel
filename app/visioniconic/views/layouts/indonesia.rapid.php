<!DOCTYPE html>
<html lang="id">

<head>

    <title>{{ title }}</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="{{ viewport }}">
    <meta name="author" content="{{ author }}">
    <meta name="description" content="{{ description }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/static/favicon.png">
</head>

<body>

    <header>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="kontak">Contact</a></li>
            <li><a href="malscan">Malscan</a></li>
        </ul>
    </header>

    <main>
        {{ content | raw }} <!-- Konten dari view akan ditampilkan di sini -->
    </main>

    <footer>

    </footer>

</body>

</html>