<?php

include('includes/connection.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
    
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Página Inicial</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Avaliação de PAPs</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Perfil</a>
				<a href="actions/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<form action="actions/insertProject.php" method="POST">
       
        <label for="titulo">Titulo:</label><br>
        <input type="text" id="titulo" name="titulo"><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"></textarea><br><br>
 
        <label for="aluno1">Nome do Aluno:</label><br>
        <input type="text" id="aluno1" name="aluno1"><br><br>
 
		<label for="aluno2">Nome do segundo Aluno:</label><br>
        <input type="text" id="aluno2" name="aluno2"><br><br>

        <label for="nome_professor">Nome do Professor:</label><br>
        <input type="text" id="nome_professor" name="nome_professor"><br><br>
 
        <label for="data_inicio">Data de Início:</label><br>
        <input type="date" id="data_inicio" name="data_inicio"><br><br>
 
        <label for="data_entrega">Data de Entrega:</label><br>
        <input type="date" id="data_entrega" name="data_entrega"><br><br>
 
        <label for="avaliacao_final">Avaliação Final:</label><br>
        <input type="number" id="avaliacao_final" name="avaliacao_final"><br><br>
 
        <label for="myfile">Select a file:</label>
        <input type="file" id="myfile" name="myfile"><br><br>

        <input type="submit" value="Publicar">

      </form>
		</div>
	</body>
</html>