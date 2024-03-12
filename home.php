<?php

session_start();

include('includes/connection.php');


if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;


}
$stmt = $conn->prepare("SELECT * FROM paps");
if(!$stmt) {
	echo "Error: " . $conn->error;
	exit;
}
if(!$stmt->execute()) {
	echo "Error: " . $stmt->error;
	exit;
  }
$projeto = $stmt->get_result();
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
		<?php
		include('includes/nav.php');
		?>
		<div class="content">
			<h2>Página Inicial</h2>
			<table class="">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descricao</th>
                        <th>Cargo</th>
                        <th>Nome do professor</th>
                        <th>Data de inicio</th>
                        <th>Data de entrega</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php while ($row = $projeto->fetch_assoc()): ?>
                        <td>
							<a href="projeto.php?id_paps=<?php echo $row['id_paps']; ?>">
							<?php echo htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');?>
					</a>
					</td>
						  <td><?php echo htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8');?></td>
						  <td><?php echo htmlspecialchars($row['cargo'], ENT_QUOTES, 'UTF-8');?></td>
						  <td><?php echo htmlspecialchars($row['nome_professor'], ENT_QUOTES, 'UTF-8');?></td>
						  <td><?php echo htmlspecialchars($row['data_inicio'], ENT_QUOTES, 'UTF-8');?></td>
						  <td><?php echo htmlspecialchars($row['data_entrega'], ENT_QUOTES, 'UTF-8');?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		</div>
	</body>
</html>