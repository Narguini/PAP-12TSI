<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.html');
    exit;
}

include('../includes/connection.php');

if(!isset($_POST['nome'], $_POST['email'], $_POST['password'], $_POST['cargo'])) {
    exit('Por favor preencha todos os campos');
}

$query = "SELECT id FROM utilizadores WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['email']);
if(!$stmt || !$stmt->execute()) {
    echo "Error: " . $conn->error;
    exit;
}

$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo 'Email já existe';
    exit;
} else {
    $query = "INSERT INTO utilizadores (nome, email, password, cargo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bind_param('ssss', $_POST['nome'], $_POST['email'], $password, $_POST['cargo']);
    if(!$stmt || !$stmt->execute()) {
        echo "Error: " . $conn->error;
        exit;
    }
    header('Location: ../pages/manage/index.php');
}

