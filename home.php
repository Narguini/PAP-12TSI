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

function trimStr($text) {
    $maxLength = 150;

    if (strlen($text) > $maxLength) {
        echo substr($text, 0, $maxLength).'...';
    } else {
        echo $text;
    }
}


function formatStudents($student, $otherStudent) {
	// if two student names are present, do the first echo, else just echo first student
	if($student && $otherStudent) {
		echo $student . " & " . $otherStudent;
	} else {
		echo $student;
	}
}

function formatDates($sDate, $eDate) {
	$startDate = date_create($sDate);
	$endDate = date_create($eDate);

	if($startDate && $endDate) {
		echo date_format($startDate,"m/d/Y") . " - " . date_format($endDate,"m/d/Y"); 
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Página Inicial</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script defer src="https://cdn.tailwindcss.com"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<?php
		include('includes/nav.php');
		?>
		<div class="container mx-auto mt-12 p-4">
			<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
				<?php while ($row = $projeto->fetch_assoc()): ?>
					<div class="p-6 bg-white rounded-md border-l-8 border-blue-500 flex flex-col gap-3 justify-between h-54">
						<div class="flex flex-col">
							<h2 class="text-gray-900 text-2xl font-semibold"><?php echo htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');?></h2>
							<div class="text-regular text-gray-400 mt-2 flex items-center gap-x-3">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 15 15"><path fill="currentColor" d="M5.5 0a3.499 3.499 0 1 0 0 6.996A3.499 3.499 0 1 0 5.5 0m-2 8.994a3.5 3.5 0 0 0-3.5 3.5v2.497h11v-2.497a3.5 3.5 0 0 0-3.5-3.5zm9 1.006H12v5h3v-2.5a2.5 2.5 0 0 0-2.5-2.5"/><path fill="currentColor" d="M11.5 4a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5"/></svg>
								<?php echo formatStudents(htmlspecialchars($row['aluno1'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($row['aluno2'], ENT_QUOTES, 'UTF-8'));?>
							</div>
							<div class="text-regular text-gray-400 mt-2 flex items-center gap-x-3 -ml-1">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
								<?php echo htmlspecialchars($row['nome_professor'], ENT_QUOTES, 'UTF-8');?>
							</div>
							<div class="text-regular text-gray-400 mt-2 flex items-center gap-x-3 -ml-1">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
									<path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V3q0-.425.288-.712T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.712T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v4.675q0 .425-.288.713t-.712.287q-.425 0-.712-.288T19 10.676V10H5v10h5.8q.425 0 .713.288T11.8 21q0 .425-.288.713T10.8 22zm13 1q-2.075 0-3.537-1.463T13 18q0-2.075 1.463-3.537T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23m.5-5.2v-2.3q0-.2-.15-.35T18 15q-.2 0-.35.15t-.15.35v2.275q0 .2.075.388t.225.337l1.525 1.525q.15.15.35.15t.35-.15q.15-.15.15-.35t-.15-.35z"/>
								</svg>
								<?php echo formatDates(htmlspecialchars($row['data_inicio'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($row['data_entrega'], ENT_QUOTES, 'UTF-8'));?>
							</div>
							<p class="mt-6 text-gray-700 font-medium mt-6"><?php trimStr(htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8'));?></p>
						</div>
						<a href="projeto.php?id_paps=<?php echo $row['id_paps']; ?>" class="bg-blue-500 hover:bg-blue-600 transition-all duration-150 ease-in-out w-2/4 py-2 px-3 text-white font=medium rounded-md text-center">
							View project
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</body>
</html>