<?php include 'header.php'; ?>

<h2>Enter a Message</h2>

<form method="post" action="">
  <input type="text" name="message" placeholder="Enter your message" required>
  <button type="submit" name="submit">Submit</button>
</form>

<br>
<a href="showAll.php">Show all records</a>



<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=final", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $message = htmlspecialchars(trim($_POST['message']));
        $stmt = $pdo->prepare("INSERT INTO string_info (message) VALUES (:msg)");
        $stmt->bindParam(':msg', $message);
        $stmt->execute();
        echo "<p>Message saved successfully.</p>";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

</body>
</html>
