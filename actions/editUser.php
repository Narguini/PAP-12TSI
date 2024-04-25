<?php 
session_start();
include ('../includes/connection.php');

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.html');
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['nome'];
$role = $_POST['cargo'];

$query = "SELECT id, email FROM utilizadores WHERE email = ? AND id != ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('si', $_POST['email'], $_POST['id']);
if(!$stmt || !$stmt->execute()) {
    echo "Error: " . $conn->error;
    exit;
}

$stmt->store_result();

if ($stmt->num_rows > 0 ) {
    echo 'Email já existe';
    exit;
} else {
    // update user
    if (!empty($_POST['password'])) {
        // password is provided, hash it and include it in the update
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE utilizadores SET nome = ?, email = ?, password = ?, cargo = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $name, $email, $password, $role, $_POST['id']);
    } else {
        // password is not provided, exclude it from the update
        $query = "UPDATE utilizadores SET nome = ?, email = ?, cargo = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $name, $email, $role, $_POST['id']);
    };
    if(!$stmt || !$stmt->execute()) {
        echo "Error: " . $conn->error;
        exit;
    }
    header('Location: ../pages/manage/index.php');
}



?>