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
                        <form action="/controllers/posts/addPostToFavorite.php" method="POST">
                        <button class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>