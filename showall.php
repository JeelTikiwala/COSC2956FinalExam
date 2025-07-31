<?php include 'header.php'; ?>

<h2>All Records</h2>

<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=final", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM string_info");
    while ($row = $stmt->fetch()) {
        echo "ID: {$row['string_id']} - Message: {$row['message']}<br>";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

<h2>Delete a Record</h2>

<form method="post" action="">
  <input type="number" name="delete_id" placeholder="Enter string_id to delete" required>
  <button type="submit" name="delete">Delete</button>
</form>

<?php
if (isset($_POST['delete'])) {
    $id = filter_var($_POST['delete_id'], FILTER_VALIDATE_INT);
    if ($id !== false) {
        $stmt = $pdo->prepare("DELETE FROM string_info WHERE string_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "<p>Record deleted successfully.</p>";
    } else {
        echo "<p>Invalid ID.</p>";
    }
}
?>

<br><br>
<a href="index.php">Go back to index</a>

</body>
</html>
