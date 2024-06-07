<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<div class="container-fluid">
    <div class="row-mt-3">
        
        <div class="col-md-6">
        <?php
        include '/var/www/html/controllers/posts/allPosts.php';
        ?>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-favorite').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/addPostToFavorite.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    location.reload(); 
                } else {
                    alert('Failed to remove post from favorites: ' + data.message);
                }
            },
            error: function() {
                alert('Error removing post from favorites');
            }
        });
    });
});
</script>
</body>
</html>
