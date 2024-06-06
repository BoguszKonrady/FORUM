<?php
include '/var/www/html/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

try {
    $currentUserId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit();
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
        }
        .nav-link {
            color: #fff !important;
        }
        .sidebar, .content, .right-sidebar {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 0px;
            padding: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .footer {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <?php include '/var/www/html/views/user/userInfo.php'; ?>
        </div>
        
        <div class="col-md-6">
        <?php
        include '/var/www/html/controllers/posts/favoritesPosts.php';
        foreach ($posts as $post): ?>
                    <div class="post-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($post['username']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($post['content']); ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $post['created_at']; ?></small></p>
                            <button class="btn btn-danger remove-from-favorites" data-post-id="<?php echo $post['id']; ?>">Okejka w dol</button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($posts)): ?>
                    <p class="text-center">Nie masz polubionego żadnego postu.</p>
                <?php endif; ?>
        </div>
        
        <div class="col-md-3 sidebar">
        </div>
    </div>
</div>


    <footer class="footer mt-3">
        <p>&copy; 2023 SocialApp. All rights reserved.</p>
        <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
        
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove-from-favorites').click(function() {
        var postId = $(this).data('post-id');
        $.ajax({
            url: '/controllers/posts/removePostFromFaviorites.php',
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
