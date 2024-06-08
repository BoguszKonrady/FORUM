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
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
    <link rel="icon" href="http://localhost:8080/resources/img/logo.png" type="image/png">
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
                        <div class="post">
                            <p ><?php echo htmlspecialchars($post['content']); ?></p>
                            
                            <?php if ($post['image_path']): ?>
                                <img class='img_posts' src="http://localhost:8080/<?php echo htmlspecialchars($post['image_path'])?>" alt="Post Image" class="img-fluid mt-2">
                            <?php endif; ?>
                            <p><small class="text-muted">Dodano: <?php echo htmlspecialchars($post['created_at']); ?></small></p>
                            <a href="editPost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Edytuj</a>
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Nie masz jeszcze żadnych postów.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
include '/var/www/html/views/layout/footer.php';
?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
