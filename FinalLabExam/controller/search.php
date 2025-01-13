<?php
require_once '../model/userModel.php';

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $authors = searchAuthors($query);
    foreach ($authors as $author) {
        echo "<tr>
                <td>{$author['username']}</td>
                <td>{$author['name']}</td>
                <td>{$author['contact']}</td>
              </tr>";
    }
}
?>
