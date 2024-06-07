<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/posts/userPosts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>
<div class="container mt-5">
    <div class="col-md-6 offset-md-3">
        <h2>Edit Post</h2>
        <form action="/controllers/posts/editPost.php?id=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <textarea name="postContent" class="form-control" placeholder="What's on your mind?" required><?php echo htmlspecialchars($post['content']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="postImage" class="form-label">Update Image</label>
                <input type="file" class="form-control" id="postImage" name="postImage">
                <?php if ($post['image_url']): ?>
                    <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image" class="img-fluid mt-2">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
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
