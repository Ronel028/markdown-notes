<?php include_once("../partials/head.php") ?>
    <title>NsTK | Sigin</title>
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
                        <button type="submit" class="btn">Signin</button>        
                    </div>
                    <div class="register-route">
                        <a href="../register/register.php">Register</a>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
<?php include_once("../partials/footer.php") ?>