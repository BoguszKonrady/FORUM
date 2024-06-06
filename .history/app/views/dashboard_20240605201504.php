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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Strona główna</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Posty</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Znajomi</a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li>
                <li class="nav-item"><a class="nav-link" href="#">Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-3 sidebar">
                <h4>John Doe</h4>
                <p>Short bio about John Doe...</p>
                <hr>
                <ul class="list-unstyled">
                    <li><a href="#">News Feed</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Friends</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Groups</a></li>
                    <li><a href="#">Marketplaces</a></li>
                </ul>
                <hr>
                <h5>Trending Topics</h5>
                <ul class="list-unstyled">
                    <li><a href="#">#Trending1</a></li>
                    <li><a href="#">#Trending2</a></li>
                    <li><a href="#">#Trending3</a></li>
                </ul>
            </div>

            <div class="col-md-6 content">
                <div class="post-composer mb-3">
                    <textarea class="form-control" placeholder="What's on your mind?"></textarea>
                    <button class="btn btn-primary mt-2">Create Post</button>
                </div>
                <div class="news-feed">
                    <div class="card">
                        <img src="image_url.jpg" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">Post Title</h5>
                            <p class="card-text">Post content snippet...</p>
                            <button class="btn btn-primary">Add to Favorites</button>
                        </div>
                    </div>
                    <!-- More post cards... -->
                </div>
            </div>

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
