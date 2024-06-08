<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/user/profile.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/views/style/style.css">
    <link rel="stylesheet" href="/views/style/style-nav.css">
    <link rel="stylesheet" href="/views/style/profile.css">
    <link rel="icon" href="http://localhost:8080/resources/img/logo.png" type="image/png">
</head>
<body>
<?php include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container mt-5">
    
    <div class="profile-info">
        <div class="row">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informacje o profilu</h5>
                        <div class="profile-header">
                            <div class="cover"></div>
                            <img src="<?php echo htmlspecialchars($user['avatar_url']); ?>" class="avatar" alt="User Avatar">
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nazwa użytkownika:</strong> <?php echo htmlspecialchars($user['username']); ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                            <li class="list-group-item"><strong>Data dołączenia:</strong> <?php echo htmlspecialchars($user['created_at']); ?></li>
                        </ul>
                    </div>
                    <div class="profile-stats">
                    <div class="stat">
                        <h4><?php echo $friendCount; ?></h4>
                        <p>Znajomi</p>
                    </div>
                    <div class="stat">
                        <h4><?php echo $postCount; ?></h4>
                        <p>Posty</p>
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