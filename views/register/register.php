<?php include_once("../../database/config.php") ?>

<?php 
    $errorList = array();
    $error = "";
    if(isset($_POST["register"])){
        $username = $_POST["username"];

        if($username === ""){
            $errorList[] = "Please input username before login";
        }
        
        $getQuery = "SELECT * FROM account";
        $getUser = $connection->query($getQuery);
        $user = $getUser->num_rows;
        if($user > 0){
            while($userData = $getUser->fetch_assoc()){
                if($username === $userData['username']){
                    $errorList[] = "Sorry this username already taken";
                }
            }
        }

        if(count($errorList) > 0){
           $error = $errorList[0];
        }else{
            $sqlQuery = "INSERT INTO `account`(`username`) VALUES ('$username')";
            
            $executeQuery = $connection->query($sqlQuery);
    
            if($executeQuery){
                header("Location: http://".$_SERVER['HTTP_HOST']."/views/login/signin.php");
            }else{
                header("Location: http://".$_SERVER['HTTP_HOST']."/views/register/register.php");
            }
        }

    }
?>

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
                <?php if(count($errorList) > 0) { ?>
                    <div class="error">
                        <svg width="17" height="17" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 10.625C7.67708 10.625 7.82563 10.5652 7.94563 10.4456C8.06563 10.326 8.12542 10.1775 8.125 10C8.125 9.82292 8.065 9.67458 7.945 9.555C7.825 9.43542 7.67667 9.37542 7.5 9.375C7.32292 9.375 7.17437 9.435 7.05437 9.555C6.93437 9.675 6.87458 9.82333 6.875 10C6.875 10.1771 6.935 10.3256 7.055 10.4456C7.175 10.5656 7.32333 10.6254 7.5 10.625ZM6.875 8.125H8.125V4.375H6.875V8.125ZM7.5 13.75C6.63542 13.75 5.82292 13.586 5.0625 13.2581C4.30208 12.9302 3.64063 12.4848 3.07813 11.9219C2.51563 11.3594 2.07042 10.6979 1.7425 9.9375C1.41458 9.17708 1.25042 8.36458 1.25 7.5C1.25 6.63542 1.41417 5.82292 1.7425 5.0625C2.07083 4.30208 2.51604 3.64063 3.07813 3.07813C3.64063 2.51563 4.30208 2.07021 5.0625 1.74188C5.82292 1.41354 6.63542 1.24958 7.5 1.25C8.36458 1.25 9.17708 1.41417 9.9375 1.7425C10.6979 2.07083 11.3594 2.51604 11.9219 3.07813C12.4844 3.64063 12.9298 4.30208 13.2581 5.0625C13.5865 5.82292 13.7504 6.63542 13.75 7.5C13.75 8.36458 13.5858 9.17708 13.2575 9.9375C12.9292 10.6979 12.484 11.3594 11.9219 11.9219C11.3594 12.4844 10.6979 12.9298 9.9375 13.2581C9.17708 13.5865 8.36458 13.7504 7.5 13.75Z" fill="#45443F"/>
                        </svg>
                        <?php echo $error ?>
                    </div>
                <?php } ?>
                <form class="form" method="POST">
                    <input type="text" name="username" id="username" placeholder="Enter your username...">  
                    <div class="auth-btn-container">
                        <button type="submit" class="btn" name="register">Register</button>        
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