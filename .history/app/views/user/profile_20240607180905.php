<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/var/www/html/style/style.css">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
        </div>
        
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/friends/friendsList.php'; ?>
        </div>
    </div>
</div>

<footer class="footer mt-3">
    <p>&copy; 2023 SocialApp. Wszelkie prawa zastrzeżone.</p>
    <p><a href="#">O nas</a> | <a href="#">Pomoc</a> | <a href="#">Warunki</a> | <a href="#">Prywatność</a> | <a href="#">Ciasteczka</a> | <a href="#">Reklamy</a></p>
</footer>
<!-- Poprawna kolejność importów JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
