<?php
include('../includes/connection.php');
$postId = $_POST['id'];

session_start();
$userId = $_SESSION['id'];
$avaliacao = $_POST['avaliacao'];

$stmt = $conn->prepare("INSERT INTO avaliacao(avaliacao, user_id, id_paps) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $avaliacao, $userId, $postId);
        if ($stmt->execute()){
            $stmt->close();
            header('Location:../pages/projeto.php?id_paps='.$postId);
        }
         else {
            $stmt->close();
            echo("Error!" . mysqli_error($conn));
    }   

?>