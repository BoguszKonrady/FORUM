<?php
include 'getUserData.php';

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Użytkownika</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Profil Użytkownika</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nazwa użytkownika: <?php echo htmlspecialchars($user['username']); ?></h5>
                <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <p class="card-text">Data rejestracji: <?php echo htmlspecialchars($user['created_at']); ?></p>
                <a href="editProfile.php" class="btn btn-primary">Edytuj profil</a>
                <a href="/index.php" class="btn btn-secondary">Wróć do panelu</a>
            </div>
        </div>
    </div>
</body>
</html>
