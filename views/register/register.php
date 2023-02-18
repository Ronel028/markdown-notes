<?php include_once("../partials/head.php") ?>
    <title>NsTK | Register</title>
</head>
<body>
    <main class="auth-main">
        <div class="wrapper auth-card">
            <div class="auth-container">
                <div class="logo-title">
                    <h2>NsTK</h2>
                    <p>Note’s taking app the simplest way to keep notes</p>
                </div>
                <form class="form">
                    <input type="text" name="username" id="username" placeholder="Enter your username...">  
                    <div class="auth-btn-container">
                        <button type="submit" class="btn">Register</button>        
                    </div>
                    <div class="login-route">
                        <a href="../login/signin.php">Login</a>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
<?php include_once("../partials/footer.php") ?>