<h1>Profil użytkownika</h1>
    <p><strong>Nazwa użytkownika:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Biografia:</strong> <?php echo htmlspecialchars($user['bio']); ?></p>
    <a href="/index.php">Powrót do strony głównej</a>