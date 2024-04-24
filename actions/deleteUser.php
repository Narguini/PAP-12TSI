<?php
session_start();
include('../includes/connection.php');

$userId = $_POST['id'];

if(!isset($userId)) {
    header('Location: ../pages/manage/index.php');
    exit;
}

$stmt = $conn->prepare("DELETE FROM utilizadores WHERE id = ?");
$stmt->bind_param("i", $userId);

if(!$stmt) {
    echo "Error: " . $conn->error;
    exit;
}
if(!$stmt->execute()) {
    echo "Error: " . $stmt->error;
    exit;
}

header('Location: ../pages/manage/index.php');