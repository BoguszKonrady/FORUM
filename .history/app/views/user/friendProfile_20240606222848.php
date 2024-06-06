<?php
include '/var/www/html/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

try {
    $currentUserId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email, created_at, avatar_url FROM users WHERE id = :currentUserId");
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
<?php 
include '/var/www/html/controllers/friends/friendProfile.php';
include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container mt-5">
    <div class="col-md-6 offset-md-3 profile-card">
        <h2><?php echo htmlspecialchars($friend['username']); ?>'s Profile</h2>
        <img src="<?php echo htmlspecialchars($friend['avatar_url'] ?: '/path/to/default-avatar.jpg'); ?>" alt="Profile Picture">
        <p><strong>Email:</strong> <?php echo htmlspecialchars($friend['email']); ?></p>
        <p><strong>Joined:</strong> <?php echo date('F j, Y', strtotime($friend['created_at'])); ?></p>
    </div>
    <div class="col-md-6 offset-md-3">
        <h3><?php echo htmlspecialchars($friend['username']); ?></h3>
        <?php if (empty($posts)): ?>
            <p class="text-center">Ten użytkownik nie ma żadnych postów.</p>
        <?php else: ?>
            <?php foreach ($posts as $post): ?>
                <div class="post-card">
                    <p><?php echo htmlspecialchars($post['content']); ?></p>
                    <?php if ($post['image_url']): ?>
                        <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="Post Image">
                    <?php endif; ?>
                    <p class="text-muted"><small><?php echo date('F j, Y, g:i a', strtotime($post['created_at'])); ?></small></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
    <footer class="footer mt-3">
        <p>&copy; 2023 SocialApp. All rights reserved.</p>
        <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
