<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
            <h5>Dodaj Post</h5>
            <?php include '/var/www/html/views/posts/addPost.php'; ?>
            <h5>Wszystkie Posty</h5>
            <?php include '/var/www/html/views/posts/allPosts.php'; ?>
        </div>
        
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/friends/friendsList.php'; ?>
        </div>
    </div>
</div>