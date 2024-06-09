<div class="sidebar">
    <div class="card">
        <div class="card-body">
                <div class="cover-photo">
                    <img src="../resources/cover-img/background.jpg" alt="Cover Photo">
                </div>
                <div class="profile-picture-container">
                    <div class="profile-picture">
                        <img src="http://localhost:8080/<?php echo htmlspecialchars($user['avatar_url']); ?>" class="avatar" alt="User Avatar">
                    </div>
                </div>
                <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="card-text"><?php echo htmlspecialchars($user['email']); ?></p>
                <p>Użytkownik od: <?php echo htmlspecialchars($user['created_at']); ?></p>
               
               
        </div>
    </div>
                <div class="profile-stats">
                    <div>
                        <strong>69</strong>
                        <span>Postów</span>
                    </div>
                    <div>
                        <strong>420</strong>
                        <span>Znajomi</span>
                    </div>
                    
                    
                </div>
                <div>
                    <div class="button-container">
                        <a href="user/profile.php"><button class="custom-button"><i class="fa-solid fa-user"></i> Profil</button></a>
                        <a href="friends/friends.php"><button class="custom-button"><i class="fa-solid fa-user-group"></i> Znajomi</button></a>
                        <a href="posts/userPosts.php"><button class="custom-button"><i class="fa-solid fa-newspaper"></i> Moje posty</button></a>
                        <a href="user/settings.php"><button class="custom-button"><i class="fa-solid fa-gear"></i> Ustawienia konta</button></a>
                    </div>
                </div>
</div>