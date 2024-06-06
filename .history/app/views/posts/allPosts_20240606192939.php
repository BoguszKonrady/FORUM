<div class="container">
    <div class="col-md-6 content mt-5">
        <div class="post-composer mb-3">
            <form action="add_post.php" method="post">
                <textarea name="postContent" class="form-control" placeholder="What's on your mind?" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Create Post</button>
            </form>
        </div>
        <div class="news-feed">
            <?php foreach ($posts as $post): ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>