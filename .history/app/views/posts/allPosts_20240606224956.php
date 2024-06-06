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
                        <form action="/controllers/posts/addPostToFaviorite.php" method="post" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Lubie to</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-favorites').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/addPostToFaviorite.php',
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