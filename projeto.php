<?php

include('includes/connection.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;


}
echo  $_GET['id_paps'];
$sql = "SELECT * FROM paps WHERE id_paps = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['id_paps']);
$stmt->execute();
$result = $stmt->get_result();
$project = $result->fetch_assoc();
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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script defer src="https://cdn.tailwindcss.com"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include('includes/nav.php'); ?>   

</body>
</html>