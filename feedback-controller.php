<?php
include __DIR__ . '/util.php';

// get data from user
$subject = trim($_POST['subject']);
$comment = trim($_POST['comment']);
$findStatus = $_POST['find'];
$rating = 0;
$hearFrom = "";

// check rating value
if (is_numeric($_POST['rating'])) {
    $rating = $_POST['rating'];
}

// create a string from array
if (isset($_POST['hearFrom'])) {
    foreach ($_POST['hearFrom'] as $item) {
        $hearFrom .= "{$item} ";
    }
}

// filling error checking
if (mb_strlen($subject, 'UTF-8') >= 50) {
    addError("Subject must be less than 50 characters.");
    header('location: feedback.php');
    die();
} elseif (mb_strlen($comment, 'UTF-8') >= 255) {
    addError("Comment must be less than 255 characters.");
    header('location: feedback.php');
    die();
}

$query = pdo()->prepare("INSERT INTO feedback (subject, comment, find_status, came_from, rating)
                                VALUES (:subject, :comment, :findStatus, :hearFrom, :rating)");

// check success execute
if ($query->execute([
    'subject' => $subject,
    'comment' => $comment,
    'findStatus' => $findStatus,
    'hearFrom' => trim($hearFrom),
    'rating' => $rating
])) {
    addMessage("Thanks for the feedback.");
} else {
    addError("Error sending data. Try again in a few minutes.");
}
header('location: feedback.php');