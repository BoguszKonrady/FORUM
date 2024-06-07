<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/user/profile.php';
include '/var/www/html/controllers/friends/friendsList.php';
?>

<div class="col-md-9">
    <h2 class="mb-4">Twoi znajomi</h2>
    <div class="friends-list">
        <?php if (count($friends) > 0): ?>
            <?php foreach ($friends as $friend): ?>
                <div class="friend-card card mb-3">
                    <div class="card-body d-flex">
                        <div class="friend-info mr-3">
                            <h5><?php echo htmlspecialchars($friend['username']); ?></h5>
                            <p><img src="<?php echo htmlspecialchars($friend['avatar_url']); ?>" alt="Avatar" class="rounded-circle" width="50"></p>
                        </div>
                        <div class="ml-auto">
                            <a href="friends/userProfile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary btn-sm">Zobacz profil</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Nie masz jeszcze żadnych przyjaciół.</p>
        <?php endif; ?>
    </div>
</div>