<div class="container d-flex justify-content-center">
    <div class="col-md-6 content mt-5">
        <div class="news-feed">
            <?php 
            require '/var/www/html/controllers/posts/allPosts.php';
            require '/var/www/html/controllers/posts/addFavorite.php';
            foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                        <form method="POST" action="/controllers/posts/addFavorite.php">
                        <button type="submit" class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                        </form>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-favorites').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/add_to_favorites.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Post added to favorites');
                } else {
                    alert('Failed to add post to favorites: ' + data.message);
                }
            },
            error: function() {
                alert('Error adding post to favorites');
            }
        });
    });
});
</script>