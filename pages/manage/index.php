<?php
include ('../../includes/connection.php'); 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['cargo'] != 'admin') {
	header('Location: ../../index.html');
	exit;
}

$stmt = $conn->prepare("SELECT * FROM utilizadores");
if(!$stmt) {
    echo "Error: " . $conn->error;
    exit;
}
if(!$stmt->execute()) {
    echo "Error: " . $stmt->error;
    exit;
  }
$result = $stmt->get_result();

function searchUser() {
    global $conn;
    $search = $_POST['nome'];
    $stmt = $conn->prepare("SELECT * FROM utilizadores WHERE nome LIKE ?");
    $stmt->bind_param("s", $search);
    if(!$stmt) {
        echo "Error: " . $conn->error;
        exit;
    }
    if(!$stmt->execute()) {
        echo "Error: " . $stmt->error;
        exit;
    }
    $result = $stmt->get_result();
    return $result;
}

if(isset($_POST['search'])) {
    $result = searchUser();
}

if(isset($_POST['refresh'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
    <script src="../../js/script.js"></script>
	<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>
	<body>
    <?php include('../../includes/nav.php'); ?> 
		
		<div class="container mx-auto p-4"> 
            <div class="flex items-center justify-between">
                <h1 class="text-gray-900 text-2xl font-semibold">Gerir Utilizadores</h1>
                <div class="flex items-center gap-3">
                    <form action="index.php" class="flex items-center gap-1" method="post">
                        <input type="text" name="nome" class="border border-black rounded-md p-2" placeholder="Procura por nome" role="search">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-md flex items-center transition-all duration-150 ease-in-out py-2 px-3" name="search">Search</button>
                    </form>
                    <form action="index.php" method="post">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white rounded-md flex items-center gap-1 transition-all duration-150 ease-in-out py-2 px-3" name="refresh">
                            Refresh
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 4V1L8 5l4 4V6c3.31 0 6 2.69 6 6c0 1.01-.25 1.97-.7 2.8l1.46 1.46A7.93 7.93 0 0 0 20 12c0-4.42-3.58-8-8-8m0 14c-3.31 0-6-2.69-6-6c0-1.01.25-1.97.7-2.8L5.24 7.74A7.93 7.93 0 0 0 4 12c0 4.42 3.58 8 8 8v3l4-4l-4-4z"/>
                            </svg> 
                        </button>
                    </form>
                    <a href="create.php" class="bg-green-600 text-white hover:bg-opacity-90 rounded-md flex items-center gap-1 transition-all duration-150 ease-in-out py-2 px-3">
                        Adicionar Utilizador
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-blue-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cargo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Eliminar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                <?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8');?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo htmlspecialchars($row['cargo'], ENT_QUOTES, 'UTF-8');?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="edit.php?id=<?php echo $row['id'];?>" class="font-medium text-blue-600 hover:underline">Editar</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form id="deleteForm" method="post" class="flex items-center justify-center">
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                    <button type="submit" class="<?php echo $row['id'] != $_SESSION['id'] ? 'block font-medium text-red-600 hover:underline' : 'hidden';?>">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>