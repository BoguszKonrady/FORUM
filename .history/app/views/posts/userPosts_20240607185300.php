<?php
include '/var/www/html/controllers/user/loggedUser.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
</head>
<body>
<?php 
include '/var/www/html/controllers/posts/userPosts.php';
include '/var/www/html/views/layout/navbar.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Twoje posty</h2>
            <?php if (count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                            <?php if ($post['image_url']): ?>
                                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image" class="img-fluid mt-2">
                            <?php endif; ?>
                            <p class="card-text"><small class="text-muted">Dodano: <?php echo htmlspecialchars($post['created_at']); ?></small></p>
                            <a href="editPost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Edytuj</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Nie masz jeszcze żadnych postów.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
    <footer class="footer mt-3">
        <p>&copy; 2023 SocialApp. All rights reserved.</p>
        <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
