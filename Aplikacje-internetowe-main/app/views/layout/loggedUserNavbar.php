<nav class="navbar navbar-expand-lg navbar-light menu">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ulubione <i class="fa-solid fa-heart"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/views/user/editProfile.php">Mój profil <i class="fa-solid fa-user"></i></a>
            </li>
        </ul>
        <form class="form-inline mx-auto search-form">
            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Szukaj..." aria-label="Szukaj">
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/views/posts/userPosts.php">Twoje posty <i class="fa-solid fa-circle-user"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Wiadomości <i class="fa-solid fa-message"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Powiadomienia <i class="fa-solid fa-bell"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controllers/LogoutController.php">Wyloguj się <i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
        </ul>
    </div>
</nav>