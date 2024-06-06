<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Display Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Add Post</h2>
            <form action="/controllers/posts/addPost.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <textarea name="postContent" class="form-control" placeholder="What's on your mind?" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="postImage" class="form-label">Add Image</label>
                    <input type="file" class="form-control" id="postImage" name="postImage">
                </div>
                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-md-6 content">
        <div class="news-feed">
            <?php 
            require '/var/www/html/controllers/posts/allPosts.php';
            foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                        <?php if ($post['image_url']): ?>
                            <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image" class="img-fluid">
                        <?php endif; ?>
                        <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                        <form action="/controllers/posts/addPost.php" method="post" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<footer class="footer mt-3">
    <p>&copy; 2023 SocialApp. All rights reserved.</p>
    <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-favorites').click(function() {
        var postId = $(this).data('post-id');
        console.log("Post ID:", postId); // Dodaj logowanie postId
        $.ajax({
            url: '/controllers/posts/add_to_favorites.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                console.log("Response:", response); // Dodaj logowanie odpowiedzi
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Post added to favorites');
                } else {
                    alert('Failed to add post to favorites: ' + data.message);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error:", error); // Dodaj logowanie błędów
                alert('Error adding post to favorites');
            }
        });
    });
});
</script>
</body>
</html>
