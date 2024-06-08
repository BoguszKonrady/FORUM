<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Style Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/style-nav.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-facebook">
    <div class="container-fluid">
        <!-- Zdjęcie z logo -->
        <a class="navbar-brand" href="/views/dashboard.php">
            <img src="" alt="Strona główna" class="logo">
        </a>
        <!-- Przycisk hamburgera -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Elementy nawigacji -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/views/posts/userPosts.php">
                        <i class="fa-solid fa-newspaper"></i> Posty
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/posts/favoritesPosts.php">
                        <i class="fa-solid fa-thumbs-up"></i> Polubione
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/views/friends/usersList.php">
                        <i class="fa-solid fa-users"></i> Użytkownicy
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/register/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Wyloguj
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
