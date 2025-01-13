<?php
require_once '../model/userModel.php';
$authors = getAllAuthors();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Author List</title>
    <script src="../assets/scripts.js"></script>
</head>
<body>
    <input type="text" id="searchInput" placeholder="Search Authors" onkeyup="searchAuthors();" />
    <div id="authorList">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($authors as $author): ?>
                <tr>
                    <td><?= $author['id'] ?></td>
                    <td><?= $author['name'] ?></td>
                    <td><?= $author['username'] ?></td>
                    <td><?= $author['contact'] ?></td>
                    <td>
                        <a href="edit.html?id=<?= $author['id'] ?>">Edit</a>
                        <a href="../controller/delete.php?id=<?= $author['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
