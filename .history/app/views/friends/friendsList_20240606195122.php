<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Pobieranie znajomych z bazy danych
try {
    $sql = "SELECT u.id, u.username, u.email 
            FROM friends f 
            JOIN users u ON f.friend_id = u.id 
            WHERE f.user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $friends = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .right-sidebar {
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            overflow-y: auto;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: -2px 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="right-sidebar">
    <h2>Your Friends</h2>
    <div class="list-group">
        <?php foreach ($friends as $friend): ?>
            <a href="profile.php?id=<?php echo $friend['id']; ?>" class="list-group-item list-group-item-action">
                <h5 class="mb-1"><?php echo htmlspecialchars($friend['username']); ?></h5>
                <p class="mb-1"><?php echo htmlspecialchars($friend['email']); ?></p>
            </a>
        <?php endforeach; ?>
        <?php if (empty($friends)): ?>
            <p class="text-center">You have no friends yet.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
