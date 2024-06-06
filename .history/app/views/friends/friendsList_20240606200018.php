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