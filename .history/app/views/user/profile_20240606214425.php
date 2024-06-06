

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosta Strona</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
include '/var/www/html/views/layout/loggedUserNavbar.php';
?>

<div class="container-fluid">
    <?php
        include '/var/www/html/views/layout/leftBar.php';
        include '/var/www/html/controllers/user/profile.php';

        $isEdit = isset($_GET['edit']) && $_GET['edit'] == 'true';
    ?>
<div class="col-md-8">
        <div id="main-content" class="container mt-3">
            <h1>Profil Użytkownika</h1>
            <?php if (!$isEdit): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Nazwa użytkownika: <?php echo htmlspecialchars($user['username']); ?></h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        <p class="card-text">Data rejestracji: <?php echo htmlspecialchars($user['created_at']); ?></p>
                        <a href="editProfile.php?edit=true" class="btn btn-primary">Edytuj profil</a>
                        <a href="/index.php" class="btn btn-secondary">Wróć do panelu</a>
                    </div>
                </div>
            <?php else: ?>
                <h2>Edytuj Profil</h2>
                <form action="/controllers/user/editProfile.php" method="post">
                    <div class="form-group">
                        <label for="username">Nazwa użytkownika:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    <a href="editProfile.php" class="btn btn-secondary">Anuluj</a>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
