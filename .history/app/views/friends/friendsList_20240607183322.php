<?php include '/var/www/html/controllers/friends/getFriends.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Lista Znajomych</h2>
            <?php foreach ($friends as $row): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['username']); ?></h5>
                        <?php if ($row['friend_id']): ?>
                            <span>Już jesteście znajomymi</span>
                        <?php else: ?>
                            <a href="/controllers/friends/addFriend.php?user_id=<?php echo $row['id']; ?>" class="btn btn-primary">Dodaj do znajomych</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.card-title {
    font-weight: bold;
}
</style>
