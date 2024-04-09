<?php 
session_start()
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
            <div class="flex items-center justify-between">
                <h1 class="text-gray-900 text-2xl font-semibold">Gerir Utilizadores</h1>
                <a href="" class="bg-green-600 text-white hover:bg-opacity-90 rounded-md flex items-center gap-1 transition-all duration-150 ease-in-out py-2 px-3">
                    Adicionar Utilizador
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/>
                    </svg>
                </a>
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
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b hover:bg-gray-50 text-gray-900">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                1
                            </th>
                            <td class="px-6 py-4">
                                test@test.com
                            </td>
                            <td class="px-6 py-4">
                                Angela Rodriguez
                            </td>
                            <td class="px-6 py-4">
                                Admin
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>