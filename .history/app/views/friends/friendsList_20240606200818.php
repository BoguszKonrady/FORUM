<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            margin-top: 20px;
        }
        .sidebar {
            border-left: 1px solid #dee2e6;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h2>Twoi znajomi</h2>
            <div class="list-group">
                <?php
                require '/var/www/html/controllers/friends/friendsList.php';
                foreach ($friends as $friend): ?>
                    <a href="profile.php?id=<?php echo $friend['id']; ?>" class="list-group-item list-group-item-action">
                        <h5 class="mb-1"><?php echo htmlspecialchars($friend['username']); ?></h5>
                        <p class="mb-1"><?php echo htmlspecialchars($friend['email']); ?></p>
                    </a>
                <?php endforeach; ?>
                <?php if (empty($friends)): ?>
                    <p class="text-center">You have no friends yet.</p>
                <?php endif; ?>
            </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
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