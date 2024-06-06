
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
                        <button class="btn btn-primary add-to-favorites" data-post-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>