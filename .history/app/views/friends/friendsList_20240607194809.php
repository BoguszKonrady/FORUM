<?php
include '/var/www/html/controllers/user/loggedUser.php';
include '/var/www/html/controllers/friends/friendsList.php';
?>
<div class="col-md-9">
            <h2 class="mb-4">Twoi znajomi</h2>
            <div class="friends-list">
                    <div class="friend-card">
                    
                        <div class="friend-info">
                            <h5><?php echo htmlspecialchars($friend['username']); ?></h5>
                            <p><img src="<?php echo htmlspecialchars($friend['avatar_url']); ?>" alt="Profile Picture"></p>
                        </div>
                        <a href="userProfile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary btn-sm">Zobacz profil</a>
                    </div>
            </div>
        </div>