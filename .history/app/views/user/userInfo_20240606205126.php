<?php
include '/var/www/html/controllers/user/getUserData.php';
?>

<div class="card">
            <div class="card-body">
                <h5 class="card-title">Nazwa użytkownika: <?php echo htmlspecialchars($user['username']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($user['avatar_url']); ?></p>
                <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p class="card-text">Data rejestracji: <?php echo htmlspecialchars($user['created_at']); ?></p>
            </div>
        </div>
