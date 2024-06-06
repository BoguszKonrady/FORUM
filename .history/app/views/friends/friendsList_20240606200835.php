
<div class="col-md-9">
            <h2 class="mb-4">Your Friends</h2>
            <div class="friends-list">
                <?php
                require '/var/www/html/controllers/friends/friendsList.php';
                foreach ($friends as $friend): ?>
                    <div class="friend-card">
                        <img src="path/to/profile-pic.jpg" alt="Profile Picture">
                        <div class="friend-info">
                            <h5><?php echo htmlspecialchars($friend['username']); ?></h5>
                            <p><?php echo htmlspecialchars($friend['email']); ?></p>
                        </div>
                        <a href="profile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary">View Profile</a>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($friends)): ?>
                    <p class="text-center">You have no friends yet.</p>
                <?php endif; ?>
            </div>
        </div>