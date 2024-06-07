<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Style Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style-nav.css">
   
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-facebook">
    <div class="container-fluid">
        <!-- Zdjęcie z logo -->
        <a class="navbar-brand" href="/views/dashboard.php">
            <img src="" alt="Logo" class="logo">
        </a>
        <!-- Przycisk hamburgera -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav center">
            <!-- Elementy nawigacji -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="posts/userPosts.php">Posty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="posts/favoritesPosts.php">Ulubione</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="friends/usersList.php">Użytkownicy</a>
            </li>
        </ul>
        <!-- Wyloguj na prawo -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="controllers//logout.php">Wyloguj</a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
