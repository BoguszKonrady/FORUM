<div class="sidebar">
    <div class="card">
        <div class="card-body">
                <div class="profile-picture-container">
                    <div class="profile-picture">
                        <img src="../resources/profile-img/profile.jpg" alt="Profile Picture">
                    </div>
                </div>
                <h2><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="card-text"><?php echo htmlspecialchars($user['email']); ?></p>
                <p>Użytkownik od: <?php echo htmlspecialchars($user['created_at']); ?></p>
               
               
        </div>
    </div>
                <div class="profile-stats">
                    <!-- <div>
                        <strong>69</strong>
                        <span>Post</span>
                    </div>
                    <div>
                        <strong>420</strong>
                        <span>Followers</span>
                    </div>
                    <div>
                        <strong>2137</strong>
                        <span>Following</span>
                    </div> -->
                    
                </div>
                <div>
                    <div class="button-container">
                        <a href="user/profile.php"><button class="custom-button">Profil</button></a>
                        <button class="custom-button">Znajomi</button>
                        <button class="custom-button">Moje posty</button>
                        <button class="custom-button">Ustawienia konta</button>
                    </div>
                </div>
</div>