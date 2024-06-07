<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/posts/userPosts.php';
include '/var/www/html/controllers/posts/editPost.php';
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
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>
<div class="container mt-5">
    <div class="col-md-6 offset-md-3">
        <h2>Edytuj Post</h2>
        <form action="/controllers/posts/editPost.php?id=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <textarea name="postContent" class="form-control" placeholder="Nowy tekst" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="postImage" class="form-label">Zmień Zdjęcie</label>
                <input type="file" class="form-control" id="postImage" name="postImage">
                <?php if ($post['image_url']): ?>
                    <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="avatar" class="img-fluid mt-2">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Edytuj</button>
        </form>
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
