
    <div class="col-md-6 content mt-5">
        <div class="news-feed">
            <?php
            require '/var/www/html/controllers/posts/allPosts.php';
            foreach ($posts as $post):
            ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                        <button class="btn btn-primary">Add to Favorites</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <div class="col-md-6 content mt-5">
        <div class="news-feed">
            <?php 
            require '/var/www/html/controllers/posts/allPosts.php';
            foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                        <button class="btn btn-primary">Add to Favorites</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>