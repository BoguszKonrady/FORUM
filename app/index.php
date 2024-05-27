<?php
session_start();

function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'rok',
        'm' => 'miesiąc',
        'w' => 'tydzień',
        'd' => 'dni',
        'h' => 'godzin',
        'i' => 'minut',
        's' => 'sekund',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' temu' : 'przed chwilą';
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosta Strona</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"> 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light menu">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Strona główna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ulubione</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mój profil</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Wyloguj się</a>
            </li>
        </ul>
    </div>
</nav>


    <div id="main-content" class="container mt-3 col-lg-6 col-md-8">
        
        <div class="card mb-3">
            <div class="card-body">
                <form action="add_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3" placeholder="Co masz na myśli?"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('uploadImage').click()">Dodaj zdjęcie</button>
                        <input type="file" name="image" id="uploadImage" style="display: none;">
                        <button type="button" class="btn btn-outline-secondary btn-sm">Dodaj lokalizację</button>
                        <button type="submit" class="btn btn-primary btn-sm">Opublikuj</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        include 'db.php';

        try {
            $stmt = $conn->prepare("SELECT title, content, username, post_date FROM posts ORDER BY post_date DESC");
            $stmt->execute();
        
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $time_ago = timeAgo($row['post_date']);
                echo "<div class='card mb-3'>
                        <div class='card-body'>
                            <div class='post-header'>
                                <span class='post-user'>{$row['username']}</span>
                                <span class='post-date'>$time_ago</span>
                            </div>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text post-description'>{$row['content']}</p>
                            <div class='post-reactions'>
                                <button type='button' class='btn btn-outline-primary btn-sm'>Like</button>
                                <button type='button' class='btn btn-outline-danger btn-sm'>Serce</button>
                                <button type='button' class='btn btn-outline-warning btn-sm'>Wow</button>
                                <button type='button' class='btn btn-outline-secondary btn-sm btn-share'>Udostępnij</button>
                                <button type='button' class='btn btn-outline-info btn-sm btn-favorite'>Dodaj do ulubionych</button>
                            </div>
                            <div class='comment-section'>
                                <input type='text' class='form-control' placeholder='Dodaj komentarz...'>
                            </div>
                        </div>
                      </div>";
            }
        } catch(PDOException $e) {
            echo "Błąd: " . $e->getMessage();
        }
        

        $conn = null;
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
