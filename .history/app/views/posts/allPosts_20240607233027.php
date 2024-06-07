<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php if (count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post-card card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                            <?php if ($post['image_url']): ?>
                                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image" class="img-fluid mt-2">
                            <?php endif; ?>
                            <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                            <button class="btn btn-primary like-button" data-post-id="<?php echo $post['id']; ?>">Like</button>
                            <span class="like-count"><?php echo $post['like_count']; ?> Likes</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Brak postów do wyświetlenia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-favorite').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/addPostToFavorite.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    location.reload(); 
                } else {
                    alert('Failed to remove post from favorites: ' + data.message);
                }
            },
            error: function() {
                alert('Error removing post from favorites');
            }
        });
    });
});
</script>
</body>
</html>
