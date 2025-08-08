<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
</head>
<body>
    <h1>📝 Guestbook</h1>

    <!-- Message Form -->
    <form action="save.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" required><br> <br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="4" cols="40" required></textarea><br> <br>

        <button type="submit">Submit</button>
    </form>

    <hr>

    <h2>Messages:</h2>

    <?php
    $file = 'messages.txt';

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        foreach (array_reverse($lines) as $line) {
            $parts = explode('|', $line);
            if (count($parts) === 3) {
                $name = htmlspecialchars(trim($parts[0]));
                $message = htmlspecialchars(trim($parts[1]));
                $date = htmlspecialchars(trim($parts[2]));
                echo "<p><strong>$name</strong> wrote: <br>$message<br><em>$date</em></p><hr>";
            }
        }
    } else {
        echo "<p>No messages yet. Be the first to write!</p>";
    }
    ?>
</body>
</html>