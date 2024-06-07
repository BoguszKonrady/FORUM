<div class="post-composer mb-3">
    <form class="formularz"action="/controllers/posts/addPost.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <textarea name="postContent" class="form-control" placeholder="Co słychać?" required rows="5" cols="50"s></textarea>
        </div>
        <div class="mb-3">
            <input type="file" name="postImage" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj post</button>
    </form>
</div>
