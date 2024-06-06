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
</div>