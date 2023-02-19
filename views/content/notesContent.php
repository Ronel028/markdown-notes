<?php 
    include_once("../../database/config.php");

    $userID = $_GET["id"];

    $sqlQuery = "SELECT * FROM notes WHERE id=$userID LIMIT 1";

    $notesData = $connection->query($sqlQuery);
    $data = $notesData->fetch_assoc();
?>

<?php include_once("../partials/head.php") ?>
    <link rel="stylesheet" href="../highlight/styles/default.min.css">
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
            <a href="../nstk/nstk.php">Back</a>
        </div>
        <div class="notes-content">
            <?php echo $data['notes_content'] ?>
        </div>
    </section>
</body>
<script src="../highlight/highlight.min.js"></script>
<script>
     hljs.highlightAll();
     document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre.ql-syntax').forEach((el) => {
            hljs.highlightElement(el);
        });
    });
</script>
<?php include_once("../partials/footer.php") ?>
