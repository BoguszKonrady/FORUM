<div class="col-md-6 content">
                <div class="post-composer mb-3">
                <form action="/controllers/posts/addPost.php" method="post" enctype="multipart/form-data">
                    <textarea name="postContent" class="form-control" placeholder="Co słychać?" required></textarea>
                    <input type="file" name="postImage" class="form-control mt-2">
                    <button type="submit" class="btn btn-primary mt-2">Dodaj post</button>
                </form>
                </div>
            </div>