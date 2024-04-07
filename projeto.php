<?php

include('includes/connection.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;


}
//echo  $_GET['id_paps'];
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
	<body>
		<?php include('includes/nav.php'); ?> 
		<div class="container mx-auto p-4">  
			<h1 class="text-white"><?php echo $projeto['titulo'];?></h1>
		</div>
	<form action="actions/insert.php" method="POST" class="text-white">
		<input type="hidden" value="<?php echo $projeto['id_paps']; ?>" name="id"/>
        <label for="avaliacao">Avaliação:</label><br>
        <input type="text" id="avaliacao" name="avaliacao"><br>
		<button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-all duration-150 ease-in-out w-1/5 ml-auto py-2 px-3 text-white font=medium rounded-md ">
			submit
		</button>
	</form>
	</body>
</html>
