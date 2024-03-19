<?php

include('includes/connection.php');

session_start();

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
		<script src="https://cdn.tailwindcss.com"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<?php include('includes/nav.php'); ?>
		<div class="container mx-auto p-4 mt-12">
			<div class="grid grid-cols-3 gap-6">
				<div class="col-span-1">
					<h1 class="text-white text-2xl font-semibold">Create a new project</h1>
					<p class="text-gray-400 mt-3 font-medium">
						<!-- some description that summarizes the forms purpose here -->
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
						Iste dolorem earum quis corrupti at deleniti optio vel consequatur, 
						laborum esse autem placeat incidunt amet expedita aut, enim eos non velit.
  						<br/><br/>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
						Iste dolorem earum quis corrupti at deleniti optio vel consequatur, 
						laborum esse autem placeat incidunt amet expedita aut, enim eos non velit.
					</p>
				</div>
				<div class="col-span-2">
					<form class="flex flex-col gap-y-5" action="actions/insertProject.php" method="POST">
						<div class="flex flex-row gap-x-3 items-center">
							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="titulo">Titulo:</label>
								<input type="text" id="titulo" name="titulo" placeholder="enter a title"  class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>

							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="aluno1">Nome do Aluno:</label>
								<input type="text" id="aluno1" name="aluno1" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>

							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="aluno1">Nome do Aluno:</label>
								<input type="text" id="aluno2" name="aluno2" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>
				
						</div>
						<div class="flex flex-row gap-x-3 items-center">
							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="nome_professor">Nome do Professor:</label>
								<input type="text" id="nome_professor" name="nome_professor" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>
							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="data_inicio">Data de Início:</label>
								<input type="date" id="data_inicio" name="data_inicio" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>

							<div class="flex flex-col gap-3 w-2/5">
								<label class="text-white font-medium" for="data_entrega">Data de Entrega:</label>
								<input type="date" id="data_entrega" name="data_entrega" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
							</div>
						</div>

						<div class="flex flex-col gap-3">
							<label  class="text-white font-medium" for="descricao">Descrição:</label>
							<textarea rows="4" id="descricao" name="descricao" class="py-2 px-2 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0"></textarea>
					</div>
					
					<button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-all duration-150 ease-in-out w-1/5 ml-auto py-2 px-3 text-white font=medium rounded-md ">
						Publicar
					</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
