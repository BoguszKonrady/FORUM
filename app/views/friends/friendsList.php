<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/user/profile.php';
include '/var/www/html/controllers/friends/friendsList.php';
?>

<div class="col-md-9">
    <h2 class="mb-4">Twoi znajomi</h2>
    <div class="friends-gallery">
        <?php if (count($friends) > 0): ?>
            <?php foreach ($friends as $friend): ?>
                <a href="friends/userProfile.php?id=<?php echo $friend['id']; ?>" class="friend-thumbnail">
                    <img src="http://localhost:8080/<?php echo htmlspecialchars($friend['avatar_url']); ?>" alt="Profile Picture">
                    <h5><?php echo htmlspecialchars($friend['username']); ?></h5>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Nie masz jeszcze żadnych przyjaciół.</p>
        <?php endif; ?>
    </div>
</div>