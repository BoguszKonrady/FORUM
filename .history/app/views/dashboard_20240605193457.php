<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }
        header {
            background-color: #4267B2;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header nav ul li {
            margin: 0 15px;
        }
        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        .container {
            display: flex;
            margin: 20px;
        }
        .sidebar, .content, .right-sidebar {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 10px;
            padding: 20px;
        }
        .sidebar {
            flex: 1;
        }
        .content {
            flex: 2;
        }
        .right-sidebar {
            flex: 1;
        }
        .card {
            margin-bottom: 20px;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .card .card-body {
            padding: 10px 0;
        }
        .card .card-title {
            font-weight: 500;
        }
        .footer {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            header nav ul {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>SocialApp</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Friends</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="sidebar">
            <div class="profile-summary">
                <h2>John Doe</h2>
                <p>Short bio about John Doe...</p>
            </div>
            <ul class="quick-links">
                <li><a href="#">News Feed</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Friends</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Groups</a></li>
                <li><a href="#">Marketplaces</a></li>
            </ul>
            <div class="trending-topics">
                <h3>Trending Topics</h3>
                <ul>
                    <li><a href="#">#Trending1</a></li>
                    <li><a href="#">#Trending2</a></li>
                    <li><a href="#">#Trending3</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="post-composer">
                <textarea placeholder="What's on your mind?"></textarea>
                <button>Create Post</button>
            </div>
            <div class="news-feed">
                <div class="card">
                    <img src="image_url.jpg" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">Post content snippet...</p>
                        <button>Add to Favorites</button>
                    </div>
                </div>
                <!-- More post cards... -->
            </div>
        </div>
        <div class="right-sidebar">
            <div class="friend-requests">
                <h3>Friend Requests</h3>
                <ul>
                    <li><a href="#">Friend Request 1</a></li>
                    <li><a href="#">Friend Request 2</a></li>
                </ul>
            </div>
            <div class="birthdays">
                <h3>Birthdays</h3>
                <ul>
                    <li><a href="#">John's Birthday</a></li>
                    <li><a href="#">Jane's Birthday</a></li>
                </ul>
            </div>
            <div class="suggested-friends">
                <h3>Suggested Friends</h3>
                <ul>
                    <li><a href="#">Suggested Friend 1</a></li>
                    <li><a href="#">Suggested Friend 2</a></li>
                </ul>
            </div>
            <div class="advertisements">
                <h3>Advertisements</h3>
                <!-- Ad content... -->
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2023 SocialApp. All rights reserved.</p>
        <p><a href="#">About</a> | <a href="#">Help</a> | <a href="#">Terms</a> | <a href="#">Privacy</a> | <a href="#">Cookies</a> | <a href="#">Ads</a></p>
        <p><select>
            <option value="en">English</option>
            <option value="es">Español</option>
            <option value="fr">Français</option>
        </select></p>
    </footer>
</body>
</html>
