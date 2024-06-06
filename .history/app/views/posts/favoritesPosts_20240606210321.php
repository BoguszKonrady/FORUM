<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Favorite Posts</h2>
            <div class="posts-list">
                <?php
                require '/var/www/html/controllers/posts/favioritePosts.php';
                foreach ($posts as $post): ?>
                    <div class="post-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                            <button class="btn btn-danger remove-from-favorites" data-post-id="<?php echo $post['id']; ?>">Remove from Favorites</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($posts)): ?>
                    <p class="text-center">You have no favorite posts yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>