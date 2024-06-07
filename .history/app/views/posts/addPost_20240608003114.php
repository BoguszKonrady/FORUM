<div class="post-composer mb-3">
    <form action="/controllers/posts/addPost.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <textarea name="postContent" class="form-control" placeholder="Co słychać?" required rows="5" cols="50"></textarea>
        </div>
        <div class="mb-3">
            <input type="file" name="postImage" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj post</button>
    </form>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    function showNotification(type, message) {
        toastr[type](message);
    }

    $('#new-post-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: '/controllers/posts/addPost.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                showNotification('success', 'Post added successfully!');
                loadPosts();
                $('#new-post-form')[0].reset();
            },
            error: function() {
                showNotification('error', 'Failed to add post.');
            }
        });
    });

    $('.like-button').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/likePost.php',
            type: 'POST',
            data: { post_id: postId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    showNotification('success', 'Post liked!');
                    loadPosts();
                } else {
                    showNotification('error', data.message);
                }
            },
            error: function() {
                showNotification('error', 'Error liking post.');
            }
        });
    });
});
</script>
