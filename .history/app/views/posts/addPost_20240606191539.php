<div class="col-md-6 content">
                <div class="post-composer mb-3">
                <form action="add_post.php" method="post">
                    <textarea class="form-control" placeholder="What's on your mind?"></textarea>
                    <button class="btn btn-primary mt-2">Create Post</button>
                    </form>
                </div>
                <div class="news-feed">
                    <div class="card">
                        <img src="image_url.jpg" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">Post Title</h5>
                            <p class="card-text">Post content snippet...</p>
                            <button class="btn btn-primary">Add to Favorites</button>
                        </div>
                    </div>
                    <!-- More post cards... -->
                </div>
            </div>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="col-md-6 content mt-5">
        <div class="post-composer mb-3">
            
                <textarea name="postContent" class="form-control" placeholder="What's on your mind?" required></textarea>
                <button type="submit" class="btn btn-primary mt-2">Create Post</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
