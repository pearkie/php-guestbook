<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the name and message from the form
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);
    $date = date('Y-m-d H:i:s');

    // Basic validation
    if ($name && $message) {
        // Format: name|message|date
        $entry = "$name|$message|$date" . PHP_EOL;

        // Save to file
        file_put_contents('messages.txt', $entry, FILE_APPEND);

        // Redirect back to guestbook
        header('Location: index.php');
        exit;
    } else {
        echo "Both name and message are required.";
    }
} else {
    // If someone accesses this file directly via GET
    header('Location:index.php');
    exit;
}
?>