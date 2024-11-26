
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/editor.css">
    <title>Editor</title>
</head>
<body>
    <button class="homeBtn" onclick="homePage()">X</button>
    <form action="config files/insert.php" method="post">
     <div class="blog">
        <div class="head">
        <textarea type="text" class="title" placeholder="your Name..." name="username"></textarea>
    </div>
    <textarea type="text" class="article" placeholder="Start writing..." name="desc"></textarea>
    </div>
    <div class="btn">
         <input type="submit" name="insert" class="publish-btn" value="Publish">
    </div>
</form>

<script>
    function homePage(){
        window.location.href="index.php";
    }
</script>
</body>
</html>


