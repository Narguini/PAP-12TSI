<?php
session_start();
include('../includes/connection.php');

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}    

$titulo =  $_POST['titulo'];
$descricao =  $_POST['descricao'];
$aluno1 =  $_POST['aluno1'];
$aluno2 = isset($_POST['aluno2']) ? $_POST['aluno2'] : null;
$nome_professor =  $_POST['nome_professor'];
$data_inicio =  $_POST['data_inicio'];
$data_entrega =  $_POST['data_entrega'];
$role = $_SESSION['cargo'];



$stmt = $conn->prepare("INSERT INTO paps(titulo,descricao,cargo,aluno1,aluno2,nome_professor,data_inicio,data_entrega) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $titulo, $descricao, $role, $aluno1, $aluno2, $nome_professor, $data_inicio, $data_entrega);

        if ($stmt->execute()){
            $stmt->close();
            header('Location: ../pages/home.php');
        }
         else {
            $stmt->close();
            echo("Error!" . mysqli_error($conn));
    }   

?>