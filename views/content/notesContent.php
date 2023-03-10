<?php 
    include_once("../../database/config.php");

    $userID = $_GET["id"];

    $sqlQuery = "SELECT * FROM notes WHERE id=$userID LIMIT 1";

    $notesData = $connection->query($sqlQuery);
    $data = $notesData->fetch_assoc();
?>

<?php include_once("../partials/head.php") ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/default.min.css">
    <title>NsTK | Notes taking app</title>
</head>
<body>
    <header class="home-header">
        <nav class="home-nav">
            <div class="wrapper home-nav-container">
                <h3>NsTK</h3>
            </div>
        </nav>
    </header>
    <section class="wrapper notes-content-section">
        <div class="home-btn">
            <a href="../nstk/nstk.php">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 9.059V6.5C11.9997 6.30238 11.9409 6.10928 11.831 5.94502C11.7211 5.78077 11.565 5.65272 11.3825 5.577C11.2 5.50129 10.9991 5.4813 10.8052 5.51957C10.6113 5.55783 10.4331 5.65262 10.293 5.792L4 12L10.293 18.207C10.3857 18.3002 10.4958 18.3741 10.6171 18.4246C10.7385 18.4751 10.8686 18.501 11 18.501C11.1314 18.501 11.2615 18.4751 11.3829 18.4246C11.5042 18.3741 11.6143 18.3002 11.707 18.207C11.7999 18.1142 11.8736 18.004 11.9239 17.8827C11.9742 17.7614 12 17.6313 12 17.5V15.011C14.75 15.079 17.755 15.577 20 19V18C20 13.367 16.5 9.557 12 9.059Z" fill="#45443F"/>
                </svg>
            </a>
        </div>
        <div class="notes-content">
            <?php echo $data['notes_content'] ?>
        </div>
    </section>
</body>
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>
<script>
     hljs.highlightAll();
     document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre.ql-syntax').forEach((el) => {
            hljs.highlightElement(el);
        });
    });
</script>
<?php include_once("../partials/footer.php") ?>
