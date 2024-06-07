<?php  ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Twoi znajomi</h2>
            <div class="friends-list">
                <?php foreach ($friends as $friend): ?>
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($friend['avatar_url']); ?>" class="card-img" alt="Profile Picture">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($friend['username']); ?></h5>
                                    <a href="user/friendProfile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary">Zobacz profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php
include '/var/www/html/controllers/friends/friendsList.php';
include '/var/www/html/controllers/user/loggedUser.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">

    
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
            <h5>Dodaj Post</h5>
            <?php include '/var/www/html/views/posts/addPost.php'; ?>
            <h5>Wszystkie Posty</h5>
            <?php include '/var/www/html/views/posts/allPosts.php'; ?>
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
<!--<script src="/scripts/buttonHover.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
