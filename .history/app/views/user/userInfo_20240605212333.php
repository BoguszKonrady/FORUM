
<div class="card">
            <div class="card-body">
            <?php
include '/var/www/html/controllers/user/getUserData.php';
?>

                <h5 class="card-title">Nazwa użytkownika: <?php echo htmlspecialchars($user['username']); ?></h5>
                <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p class="card-text">Data rejestracji: <?php echo htmlspecialchars($user['created_at']); ?></p>
                <a href="editProfile.php" class="btn btn-primary">Edytuj profil</a>
                <a href="/index.php" class="btn btn-secondary">Wróć do panelu</a>
            </div>
        </div>
