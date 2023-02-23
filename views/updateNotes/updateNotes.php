<?php 

    include_once("../../database/config.php");

    // check if the user is login
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://".$_SERVER['HTTP_HOST']."/views/login/signin.php");
    }
    // check if the user is login

    // get user data
    $userID = $_GET["userID"];

    $stmt = $connection->prepare("SELECT * FROM notes WHERE id=?");
    $stmt->bind_param("i", $userID);

    $stmt->execute();
    $result = $stmt->get_result();
    $notesData = $result->fetch_assoc();

    $stmt->close();
    $connection->close();

?>

<?php include_once("../partials/head.php") ?>
    <link rel="stylesheet" href="../highlight/styles/default.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>NsTK | Notes taking app</title>
</head>
<body>
    <main class="add-notes-main">
        <div class="wrapper add-notes-container">
            <div class="add-notes-heading">
                <h1>Update notes</h1>
            </div>
            <form class="add-notes-form" id="updateNotes">
                <div class="add-title">
                    <label for="note-title">Title</label>
                    <input type="text" name="note-title" id="update-title" value="<?php echo $notesData["notes_title"] ?>">
                </div>
                <div class="add-content">
                    <label for="note-content">Content</label>
                    <div id="editor">
                    </div>
                </div>
                <div class="btn-container">
                    <a href="../nstk/nstk.php" class="btn">Cancel</a>
                    <button type="submit" class="btn">Update</button>
                </div>
            </form>
        </div>
    </main>
    <div id="displayData"></div>
</body>
<!-- Include the Quill library -->
<script src="../highlight/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    
    let quill = new Quill('#editor', {
        modules: {
            syntax: {
                highlight: text => hljs.highlightAuto(text).value,
            },
            toolbar: [
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['code-block', 'link'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],[{ 'list': 'ordered'}, { 'list': 'bullet' }]
            ]
        },
        theme: 'snow'
    });

    // Insert a numbered list
    quill.formatLine(1, 1, { list: 'ordered' });

    // design editor
    document.querySelector(".ql-toolbar").style.backgroundColor = "#f1f1f1"
    document.querySelector(".ql-toolbar").style.fontFamily = "Space Grotesk"
    document.querySelector(".ql-toolbar").style.borderRadius = "7px 7px 0 0";
    document.querySelector("#editor").style.backgroundColor = "#f1f1f1"
    document.querySelector("#editor").style.height = "300px"
    document.querySelector("#editor").style.fontFamily = "Space Grotesk"
    document.querySelector("#editor").style.borderRadius = "0 0 7px 7px";
    // design editor

    const form = document.querySelector("#updateNotes")
    const title = document.querySelector("#update-title")
    quill.root.innerHTML = `<?php echo $notesData['notes_content'] ?>`

    const value = {
        title: "<?php echo $notesData["notes_title"] ?>",
        content: `<?php echo $notesData['notes_content'] ?>`
    }

    // // input event
    quill.on('text-change', function(delta, oldDelta, source) {
        value['content'] = quill.root.innerHTML
    });
    title.addEventListener("change", (e) =>{
        value['title'] = e.target.value
    })
    // // input event


    form.addEventListener("submit", async(e) =>{
        e.preventDefault()
        const formData = new FormData()
        formData.append("notes_title", value.title)
        formData.append("notes_content", value.content)
        const insertNotes = await fetch("./services/updateNotes.php?userID=<?php echo $userID ?>", {
            method: "POST",
            body: formData
        })
        const result = await insertNotes.json()
        if(result.msg){
            window.location.href = "/views/nstk/nstk.php";
        }else{
            console.log(result)
        }
    })

</script>
<?php include_once("../partials/footer.php") ?>