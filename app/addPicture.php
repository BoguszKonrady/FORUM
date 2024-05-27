<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosta Strona</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        #main-content {
            width: 60%;
            margin: 0 auto;
            max-height: 100vh;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .menu {
            background-color: #ccc;
        }
        /* Styl przesuwający pasek przewijania do prawej krawędzi */
        #main-content::-webkit-scrollbar {
            width: 8px;
        }
        #main-content::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }
        #main-content::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light menu">
        <a class="navbar-brand" href="#">#</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addPicture.php">Dodaj obrazek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Polubione</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Zapisane</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="main-content" class="container mt-3">
        
    
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
