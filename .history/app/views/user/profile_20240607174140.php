
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum matrymonialne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<?php 
include '/var/www/html/controllers/user/editProfile.php';
include '/var/www/html/views/layout/navbar.php'; ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-3 sidebar">
            <h2>Edytuj profil</h2>
               <div class="profile-edit mt-4">
            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
        </div>
        <div class="col-md-6">
        <div class="container mt-5">
    <div class="col-md-6 offset-md-3">
        <div class="profile-header">
             </div>
                <div class="profile-info">
                <img src="<?php echo htmlspecialchars($user['avatar_url'] ?: '/path/to/default-avatar.jpg'); ?>" alt="Profile Picture">
                    <h1><?php echo htmlspecialchars($user['username']); ?></h1>
                    <p><?php echo htmlspecialchars($user['email']); ?></p>
                    <p>Joined on <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
                </div>
            </div>
            </div>
        </div>
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
