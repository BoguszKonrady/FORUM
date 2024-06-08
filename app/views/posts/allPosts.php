<?php
    include '/var/www/html/controllers/posts/allPosts.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.like-button').click(function() {
        var postId = $(this).data('post-id');
        var likeButton = $(this);
        $.ajax({
            url: '/controllers/posts/likePost.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    var likeCount = likeButton.siblings('.like-count');
                    var currentCount = parseInt(likeCount.text().split(' ')[0]);
                    likeCount.text((currentCount + 1) + ' Likes');
                } else {
                    alert(data.message);
                }
            },
            error: function() {
                alert('Error liking post');
            }
        });
    });
});

$(document).ready(function() {
    $('#search').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();
        $('.post-card').each(function() {
            var postContent = $(this).find('.card-text').text().toLowerCase();
            if (postContent.includes(searchQuery)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});



</script>
</body>
</html>
