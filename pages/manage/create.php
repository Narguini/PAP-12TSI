<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['cargo'] != 'admin') {
    header('Location: ../../index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include('../../includes/nav.php'); ?>

    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between">
            <h1 class="text-gray-900 text-2xl font-semibold">Create a user</h1>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg mt-5">
            <form class="flex flex-col gap-y-5" action="../../actions/createUser.php" method="POST">
                <div class="flex flex-col gap-3 w-2/5">
                    <label class="text-gray-900 font-medium" for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="enter a name" class="py-2 px-2 w-full rounded-md border border-black bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
                </div>

                <div class="flex flex-col gap-3 w-2/5">
                    <label class="text-gray-900 font-medium" for="email">Email:</label>
                    <input type="text" id="email" name="email" class="py-2 px-2 w-full rounded-md border border-black bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
                </div>
                <div class="flex flex-col gap-3 w-2/5">
                    <label class="text-gray-900 font-medium" for="password">Password:</label>
                    <input type="password" id="password" name="password" class="py-2 px-2 w-full rounded-md border border-black bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
                </div>
                <div class="flex flex-col gap-3 w-2/5">
                    <label class="text-gray-900 font-medium" for="cargo">Cargo:</label>
                    <select type="text" id="cargo" name="cargo" class="py-2 px-2 w-full rounded-md border border-black bg-white text-sm text-gray-700 shadow-sm outline-none focus:ring-0">
                        <option value="admin">Admin</option>
                        <option value="professor">Professor</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-all duration-150 ease-in-out w-1/5 py-2 px-3 text-white font-medium rounded-md ">
                    Publicar
                </button>
            </form>
        </div>
    </div>
</body>

</html>