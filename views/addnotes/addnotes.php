<?php 
    // check if the user is login
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: http://".$_SERVER['HTTP_HOST']."/views/login/signin.php");
    }
    // check if the user is login

    

?>

<?php include_once("../partials/head.php") ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>NsTK | Notes taking app</title>
</head>
<body>
    <main class="add-notes-main">
        <div class="wrapper add-notes-container">
            <div class="add-notes-heading">
                <h1>Add new notes</h1>
            </div>
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
    let quill = new Quill('#editor', {
        modules: {
            toolbar: [
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['code-block', 'link'],
            [{ 'color': [] }, { 'background': [] }],
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

    // input event
    quill.on('text-change', function(delta, oldDelta, source) {
        value['content'] = quill.root.innerHTML
    });
    title.addEventListener("change", (e) =>{
        value['title'] = e.target.value
    })
    // input event


    form.addEventListener("submit", async(e) =>{
        e.preventDefault()
        const formData = new FormData()
        formData.append("notes_title", value.title)
        formData.append("notes_content", value.content)
        const insertNotes = await fetch("./services/addNotes.php", {
            method: "POST",
            body: formData
        })
        const result = await insertNotes.json()
        if(result.msg){
            window.location.href = "/views/nstk/nstk.php";
        }else{
            console.log("Error")
        }
    })

</script>
<?php include_once("../partials/footer.php") ?>