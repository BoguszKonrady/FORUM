<?php
include '/var/www/html/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

try {
    $currentUserId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit();
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
        }
        .nav-link {
            color: #fff !important;
        }
        .sidebar, .content, .right-sidebar {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 0px;
            padding: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .footer {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include '/var/www/html/views/layout/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3 sidebar">
                <?php
                    include '/var/www/html/views/user/userInfo.php';
                ?>
            </div>
            <?php include '/var/www/html/views/posts/addPost.php'; ?>
            <?php include '/var/www/html/views/posts/allPosts.php' ?>
             <?php include '/var/www/html/views/friends/friendsListPosts.php' ?>
           
            <div class="col-md-3 right-sidebar">
                <h5>Friend Requests</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Friend Request 1</a></li>
                    <li><a href="#">Friend Request 2</a></li>
                </ul>
                <hr>
                <h5>Birthdays</h5>
                <ul class="list-unstyled">
                    <li><a href="#">John's Birthday</a></li>
                    <li><a href="#">Jane's Birthday</a></li>
                </ul>
                <hr>
                <h5>Suggested Friends</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Suggested Friend 1</a></li>
                    <li><a href="#">Suggested Friend 2</a></li>
                </ul>
                <hr>
                <h5>Advertisements</h5>
                <!-- Ad content... -->
            </div>
        </div>
    </div>

    <footer class="footer mt-3">
        <p>&copy; 2023 SocialApp. All rights reserved.</p>
        <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
