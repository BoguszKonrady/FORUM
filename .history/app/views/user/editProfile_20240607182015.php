<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-6 form-container">
        <h2 class="text-center mb-4">Edytuj profil</h2>
        <form action="/controllers/user/editProfile.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
                <?php if ($user['avatar_url']): ?>
                    <img src="<?php echo htmlspecialchars($user['avatar_url']); ?>" alt="User Avatar" class="img-fluid mt-2">
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nowe hasło</label>
                <input type="password" class="form-control" id="password" name="password">
                <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
        </form>
    </div>
</div>