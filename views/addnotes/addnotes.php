<?php include_once("../partials/head.php") ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>NsTK | Notes taking app</title>
</head>
<body>
    <main class="add-notes-main">
        <div class="wrapper add-notes-container">
            <form class="add-notes-form" id="saveNotes">
                <div class="add-title">
                    <label for="note-title">Add title</label>
                    <input type="text" name="note-title" id="note-title" placeholder="Add topic/title">
                </div>
                <div class="add-content">
                    <label for="note-content">Notes content</label>
                    <div id="editor"></div>
                </div>
                <div class="btn-container">
                    <a href="../nstk/nstk.php" class="btn">Cancel</a>
                    <button type="submit" class="btn">Save</button>
                </div>
            </form>
        </div>
    </main>
    <div id="displayData"></div>
</body>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        modules: {
            toolbar: [
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['code-block', 'link'],
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            ]
        },
        theme: 'snow'
    });

    // design editor
    document.querySelector(".ql-toolbar").style.backgroundColor = "#f1f1f1"
    document.querySelector(".ql-toolbar").style.fontFamily = "Space Grotesk"
    document.querySelector(".ql-toolbar").style.borderRadius = "7px 7px 0 0";
    document.querySelector("#editor").style.backgroundColor = "#f1f1f1"
    document.querySelector("#editor").style.height = "300px"
    document.querySelector("#editor").style.fontFamily = "Space Grotesk"
    document.querySelector("#editor").style.borderRadius = "0 0 7px 7px";
    // design editor

    const form = document.querySelector("#saveNotes")
    const title = document.querySelector("#note-title")

    const value = {
        title: "",
        content: ""
    }
    quill.on('text-change', function(delta, oldDelta, source) {
        value['content'] = quill.root.innerHTML
    });
    title.addEventListener("change", (e) =>{
        value['title'] = e.target.value
    })


    form.addEventListener("submit", (e) =>{
        e.preventDefault()
        console.log(value)
    })

</script>
<?php include_once("../partials/footer.php") ?>