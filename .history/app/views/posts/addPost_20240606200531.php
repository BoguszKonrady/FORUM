<div class="col-md-6 d-flex justify-content-center">
            <div class="content">
                <div class="post-composer mb-3">
                    <form action="/controllers/posts/addPost.php" method="post">
                        <textarea name="postContent" class="form-control" placeholder="Co słychać?" required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Dodaj post</button>
                    </form>
                </div>
                <?php include '/var/www/html/views/posts/allPosts.php'; ?>
            </div>
        </div>