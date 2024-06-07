<?php include '/var/www/html/controllers/friends/userProfile.php'; ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
    <style>
        .profile-header {
            position: relative;
            margin-bottom: 30px;
        }
        .profile-header .cover {
            height: 200px;
            background: url('/path/to/cover-image.jpg') no-repeat center center;
            background-size: cover;
        }
        .profile-header .avatar {
            position: absolute;
            bottom: -50px;
            left: 20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #fff;
        }
        .profile-info {
            margin-top: 60px;
        }
        .profile-info .card {
            margin-bottom: 20px;
        }
        .profile-stats {
            text-align: center;
        }
        .profile-stats .stat {
            display: inline-block;
            margin: 0 15px;
        }
    </style>
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>
<div class="container mt-5">
    <div class="profile-header">
        <div class="cover">
            <img width="400px" height="100px" src="http://localhost:8080/resources/cover-img/cover-photo.jpg">
        </div>
        <img src="http://localhost:8080/<?php echo htmlspecialchars($user['avatar_url']); ?>" class="avatar" alt="User Avatar">
    </div>
    <div class="profile-info">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        
                    <div class="stat">
                        <h4><?php echo $postCount; ?></h4>
                        <p>Posty</p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informacje o profilu</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nazwa użytkownika:</strong> <?php echo htmlspecialchars($user['username']); ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                            <li class="list-group-item"><strong>Data dołączenia:</strong> <?php echo htmlspecialchars($user['created_at']); ?></li>
                        </ul>
                        
                    </div>
                    
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Posty użytkownika</h5>
                        <?php 
                        $stmt = $conn->prepare("SELECT content, created_at FROM posts WHERE user_id = :userId ORDER BY created_at DESC");
                        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                        $stmt->execute();
                        $userPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php if (count($userPosts) > 0): ?>
                            <?php foreach ($userPosts as $post): ?>
                                <div class="post mb-3">
                                    <p><?php echo htmlspecialchars($post['content']); ?></p>
                                    <p><small class="text-muted"><?php echo htmlspecialchars($post['created_at']); ?></small></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">Ten użytkownik nie ma żadnych postów.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '/var/www/html/views/layout/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
