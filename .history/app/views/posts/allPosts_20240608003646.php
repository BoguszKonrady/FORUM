<?php
include '/var/www/html/controllers/posts/allPosts.php';
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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($posts) && count($posts) > 0): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post-card card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                            <?php if ($post['image_url']): ?>
                                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image" class="img-fluid mt-2">
                            <?php endif; ?>
                            <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                            <button class="btn btn-primary like-button" data-post-id="<?php echo $post['id']; ?>">Polub</button>
                            <span class="like-count"><?php echo $post['like_count']; ?> Liczba polubień</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Brak postów do wyświetlenia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.like-button').click(function() {
        var postId = $(this).data('post-id');
        var likeButton = $(this);
        $.ajax({
            url: '/controllers/posts/likePost.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    var likeCount = likeButton.siblings('.like-count');
                    var currentCount = parseInt(likeCount.text().split(' ')[0]);
                    likeCount.text((currentCount + 1) + ' Likes');
                } else {
                    alert(data.message);
                }
            },
            error: function() {
                alert('Error liking post');
            }
        });
    });
});

$(document).ready(function() {
    $('#search').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();
        $('.post-card').each(function() {
            var postContent = $(this).find('.card-text').text().toLowerCase();
            if (postContent.includes(searchQuery)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>
</body>
</html>
