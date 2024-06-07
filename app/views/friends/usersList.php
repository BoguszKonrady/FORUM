<?php
include '/var/www/html/controllers/user/loggedUser.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <?php include '/var/www/html/controllers/friends/usersList.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista Użytkowników</h2>
                <div id="message"></div>
                <?php foreach ($friends as $row): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['username']); ?></h5>
                            <?php if ($row['friend_id']): ?>
                                <a href="#" class="btn btn-danger remove-friend" data-user-id="<?php echo $row['id']; ?>">Usuń ze znajomych</a>
                            <?php else: ?>
                                <a href="#" class="btn btn-primary add-friend" data-user-id="<?php echo $row['id']; ?>">Dodaj do znajomych</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include '/var/www/html/views/layout/footer.php';
?>
<!--<script src="/scripts/buttonHover.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('.add-friend').click(function(e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        var button = $(this); // Store the button for later use
        $.ajax({
            url: '/controllers/friends/addFriend.php',
            type: 'GET',
            data: { user_id: userId },
            success: function(response) {
                if (response.status === 'success') {
                    button.closest('.card-body').find('span').text('Już jesteście znajomymi');
                    button.remove(); // Remove the button after success
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function() {
                $('#message').html('<div class="alert alert-danger">Wystąpił błąd. Spróbuj ponownie później.</div>');
            }
        });
    });

    $('.remove-friend').click(function(e) {
        e.preventDefault();
        var userId = $(this).data('user-id');
        var button = $(this); // Store the button for later use
        $.ajax({
            url: '/controllers/friends/removeFriend.php',
            type: 'GET',
            data: { user_id: userId },
            success: function(response) {
                if (response.status === 'success') {
                    button.closest('.card-body').find('span').text('');
                    button.closest('.card-body').find('.card-title').append('<a href="#" class="btn btn-primary add-friend" data-user-id="' + userId + '">Dodaj do znajomych</a>');
                    button.remove(); // Remove the button after success
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function() {
                $('#message').html('<div class="alert alert-danger">Wystąpił błąd. Spróbuj ponownie później.</div>');
            }
        });
    });
});
</script>
</body>
</html>
