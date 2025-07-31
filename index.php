<!-- Name: Jeel Tikiwala
Student ID: 239659420 -->
<?php include "header.php"; ?>

<!-- q10 - 2 -->
<h2>Enter a Message</h2>

<form method="post" action="">
  <input type="text" name="message" placeholder="Enter your message" required>
  <button type="submit" name="submit">Submit</button> <!-- q10 - 3 -->
</form>

<br>
<!-- q10 - 4 -->
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
