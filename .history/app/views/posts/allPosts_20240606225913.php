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
                        <button class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove-from-favorites').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/removePostFromFaviorites.php',
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