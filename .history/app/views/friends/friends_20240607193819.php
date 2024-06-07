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
    <link rel="stylesheet" href="/views/style/profile.css">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Lista Przyjaciół</h2>
            <?php if (count($friends) > 0): ?>
                <div class="list-group">
                    <?php foreach ($friends as $friend): ?>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <img src="<?php echo htmlspecialchars($friend['avatar_url']); ?>" alt="Avatar" class="rounded-circle mr-3" style="width: 50px; height: 50px;">
                            <div>
                                <h5 class="mb-1"><?php echo htmlspecialchars($friend['username']); ?></h5>
                                <a href="userProfile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary btn-sm">Zobacz profil</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">Nie masz jeszcze żadnych przyjaciół.</p>
            <?php endif; ?>
        </div>
    </div>
</div>v>
</div>
<footer class="footer mt-3">
    <p>&copy; 2023 SocialApp. Wszelkie prawa zastrzeżone.</p>
    <p><a href="#">O nas</a> | <a href="#">Pomoc</a> | <a href="#">Warunki</a> | <a href="#">Prywatność</a> | <a href="#">Ciasteczka</a> | <a href="#">Reklamy</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>