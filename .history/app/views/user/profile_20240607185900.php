<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/user/profile.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="card">
                <img src="<?php echo htmlspecialchars($user['avatar_url']); ?>" class="card-img-top" alt="User Avatar">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($user['username']); ?></p>
                    <p class="card-text"><?php echo htmlspecialchars($user['email']); ?></p>
                    <p class="card-text"><small class="text-muted">Dołączył: <?php echo htmlspecialchars($user['created_at']); ?></small></p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Informacje o profilu</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Liczba znajomych:</strong> <?php echo $friendCount; ?></li>
                <li class="list-group-item"><strong>Liczba postów:</strong> <?php echo $postCount; ?></li>
            </ul>
        </div>
    </div>
</div>
<footer class="footer mt-3">
    <p>&copy; 2023 SocialApp. Wszelkie prawa zastrzeżone.</p>
    <p><a href="#">O nas</a> | <a href="#">Pomoc</a> | <a href="#">Warunki</a> | <a href="#">Prywatność</a> | <a href="#">Ciasteczka</a> | <a href="#">Reklamy</a></p>
</footer>
<!--<script src="/scripts/buttonHover.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
