<?php include_once("../partials/head.php") ?>
    <title>NsTK | Notes taking app</title>
</head>
<body>
    <main class="add-notes-main">
        <div class="wrapper add-notes-continer">
            <form class="add-notes-form">
                <div class="add-title">
                    <label for="note-title">Add title</label>
                    <input type="text" name="note-title" id="note-title">
                </div>
                <div class="add-content">
                    <label for="note-content">Notes content</label>
                    <textarea name="note-content" id="note-content" rows="20"></textarea>
                </div>
            </form>
        </div>
    </main>
</body>
<?php include_once("../partials/footer.php") ?>