<?php include '/var/www/html/controllers/friends/friendsList.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Twoi znajomi</h2>
            <div class="friends-list">
                <?php foreach ($friends as $friend): ?>
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?php echo htmlspecialchars($friend['avatar_url']); ?>" class="card-img" alt="Profile Picture">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($friend['username']); ?></h5>
                                    <a href="user/friendProfile.php?id=<?php echo $friend['id']; ?>" class="btn btn-primary">Zobacz profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
.card-title {
    font-weight: bold;
}
.card-img {
    max-width: 100%;
    height: auto;
}
</style>
