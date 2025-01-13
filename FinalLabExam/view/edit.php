<!DOCTYPE html>
<html>
<head>
    <title>Edit Author</title>
    <script src="../assets/scripts.js"></script>
</head>
<body>
    <form method="post" action="../controller/edit.php" onsubmit="return validateEditForm();">
        ID: <input type="text" name="id" value="" readonly /><br>
        Name: <input type="text" id="name" name="name" required /><br>
        Username: <input type="text" id="username" name="username" required /><br>
        Contact: <input type="text" id="contact" name="contact" required /><br>
        <input type="submit" name="submit" value="Update" />
    </form>
</body>
</html>
