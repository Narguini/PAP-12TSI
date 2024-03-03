<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'projeto';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Falha ao conectar ao MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM utilizadores WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Perfil</title>
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
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Detalhes da sua conta:</p>
				<table>
					<tr>
						<td>Nome:</td>
						<td><?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=htmlspecialchars($password, ENT_QUOTES)?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=htmlspecialchars($email, ENT_QUOTES)?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>