<?php

include('../includes/connection.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;


}
$sql = "SELECT * FROM paps WHERE id_paps = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['id_paps']);
$stmt->execute();

if(!$stmt) {
	echo "Error: " . $conn->error;
	exit;
}
if(!$stmt->execute()) {
	echo "Error: " . $stmt->error;
	exit;
}

$result = $stmt->get_result();
$projeto = $result->fetch_assoc();

function formatDates($sDate, $eDate) {
	$startDate = date_create($sDate);
	$endDate = date_create($eDate);

	if($startDate && $endDate) {
		echo date_format($startDate,"d/m/Y") . " - " . date_format($endDate,"d/m/Y"); 
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<?php include('../includes/nav.php'); ?> 
		<div class="container mx-auto p-4">  
            <div class="flex gap-6 items-start justify-start">
                <a href="home.php" class="flex gap-2 items-center border border-black bg-white transition-all duration-150 ease-in-out py-2 px-3 text-gray-900 font-medium rounded-full mr-auto w-36">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875q-.375.375-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12q0-.375.15-.75t.45-.675l7.7-7.7q.375-.375.888-.363t.887.388q.375.375.375.875t-.375.875z"/>
                    </svg>
                    Go back
                </a>
                <div class="flex items-start gap-3 text-gray-900 w-full">
                    <div class="flex flex-col border border-black rounded-md p-3 bg-white gap-y-6">
                        <h1 class="text-gray-900 text-4xl font-semibold"><?php echo $projeto['titulo'];?></h1>
                       <!-- Due date -->
                        <div class="flex flex-col">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24">
									<path fill="currentColor" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V3q0-.425.288-.712T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.712T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v4.675q0 .425-.288.713t-.712.287q-.425 0-.712-.288T19 10.676V10H5v10h5.8q.425 0 .713.288T11.8 21q0 .425-.288.713T10.8 22zm13 1q-2.075 0-3.537-1.463T13 18q0-2.075 1.463-3.537T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23m.5-5.2v-2.3q0-.2-.15-.35T18 15q-.2 0-.35.15t-.15.35v2.275q0 .2.075.388t.225.337l1.525 1.525q.15.15.35.15t.35-.15q.15-.15.15-.35t-.15-.35z"/>
								</svg>
                                <span class="text-lg">
                                    <?php echo formatDates(htmlspecialchars($projeto['data_inicio'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($projeto['data_entrega'], ENT_QUOTES, 'UTF-8'));?>
                                </span>
                            </div>
                        </div>
                        <!--  Assigned students -->
                        <div class="flex flex-col ml-1">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 15 15">
                                    <path fill="currentColor" d="M5.5 0a3.499 3.499 0 1 0 0 6.996A3.499 3.499 0 1 0 5.5 0m-2 8.994a3.5 3.5 0 0 0-3.5 3.5v2.497h11v-2.497a3.5 3.5 0 0 0-3.5-3.5zm9 1.006H12v5h3v-2.5a2.5 2.5 0 0 0-2.5-2.5"/>
                                    <path fill="currentColor" d="M11.5 4a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5"/>
                                </svg>
                                <ul class="flex gap-1">
                                    <li class="bg-blue-500 rounded-full text-center text-white px-1.5"><?php echo htmlspecialchars($projeto['aluno1'], ENT_QUOTES, 'UTF-8');?></li>
                                    <?php if($projeto['aluno2']): ?>
                                        <li class="bg-blue-600 rounded-full text-center text-white px-1.5"><?php echo htmlspecialchars($projeto['aluno2'], ENT_QUOTES, 'UTF-8');?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>  
                        </div>
                        <!-- Assigned professor -->
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
							<span class="bg-orange-500 rounded-full text-center text-white px-1.5"><?php echo htmlspecialchars($projeto['nome_professor'], ENT_QUOTES, 'UTF-8');?></span>
                        </div>
                        <!-- Final grade -->
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
								<path d="M9.5 1.5H11a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h1.5"/>
								<rect width="5" height="2.5" x="4.5" y=".5" rx="1"/><path d="M4.5 5.5h5M4.5 8h5m-5 2.5h5"/></g>
							</svg>
							<span class="<?php echo $projeto['avaliacao_final'] > 9.5 ? 'text-green-600 font-semibold' : 'text-red-500 font-semibold'; ?>" id="grade">
								<?php echo htmlspecialchars($projeto['avaliacao_final'], ENT_QUOTES, 'UTF-8');?>
							</span>
                        </div>  
                        <div>
                            <form action="actions/insert.php" method="POST" class="text-white flex flex-col">
                                <input type="hidden" value="<?php echo $projeto['id_paps']; ?>" name="id"/>
                                <label for="avaliacao" class="text-gray-900 font-semibold">Avaliação:</label>
                                <input type="text" id="avaliacao" name="avaliacao" class="bg-gray-50 border border-black text-gray-900 sm:text-sm rounded-lg focus:ring-0 block w-full p-2.5 focus-ring-0 outline-none" placeholder="Enter grade">
                                <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-600 transition-all duration-150 ease-in-out ml-auto py-2 px-3 text-white font-medium rounded-md ">
                                    submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="flex flex-col border border-black rounded-md p-3 bg-white max-w-5xl">
                        <p class="text-gray-900 text-xl font-regular">
                            <?php echo htmlspecialchars($projeto['descricao'], ENT_QUOTES, 'UTF-8')?>
                        </p>
                    </div>
                </div>
            </div>
		</div>
        
	</body>
</html>
