<?php 
// Ridiculous workaround to get the correct path
$base_path = $_SERVER['DOCUMENT_ROOT']; // Document root
$manage_folder = "pages/manage/"; // Path to your manage folder
$actions_folder = "actions/";

$path = (strpos($_SERVER['SCRIPT_NAME'], $manage_folder) !== false) ? "../" : "";
$actions_path = (strpos($_SERVER['SCRIPT_NAME'], $manage_folder) !== false) ? "../../" . $actions_folder : "../" . $actions_folder;
?>
<nav aria-label="navigation" class="container mx-auto flex items-center justify-between p-4">
        <a aria-label="logo" href="/" class="inline-flex text-black items-center justify-center rounded-lg">
            <span class="sr-only">Logo</span>
            Logo do Projeto
        </a>

        <ul class="flex items-center gap-2 text-sm font-medium text-black">

            <li class="rounded-lg px-3 py-2 hover:text-blue-500 ease-in duration-200 hover:cursor-pointer" aria-label="projects">
                <a href="<?= $path ?>home.php" class="flex gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z" />
                    </svg>
                    Início
                <a>
            </li>

            <?php if ($_SESSION['cargo'] == 'admin') : ?>
                <li class="rounded-lg px-3 py-2 hover:text-blue-500 ease-in duration-200 hover:cursor-pointer" aria-label="projects">
                    <a href="<?= $path ?>manage/index.php" class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M2 18v-.8q0-.825.425-1.55t1.175-1.1q1.275-.65 2.875-1.1T10 13h.35q.15 0 .3.05q-.725 1.8-.6 3.575T11.25 20H4q-.825 0-1.412-.587T2 18m15 0q.825 0 1.413-.587T19 16q0-.825-.587-1.412T17 14q-.825 0-1.412.588T15 16q0 .825.588 1.413T17 18m-7-6q-1.65 0-2.825-1.175T6 8q0-1.65 1.175-2.825T10 4q1.65 0 2.825 1.175T14 8q0 1.65-1.175 2.825T10 12m5.85 8.2l-.15-.7q-.3-.125-.562-.262T14.6 18.9l-.725.225q-.325.1-.637-.025t-.488-.4l-.2-.35q-.175-.3-.125-.65t.325-.575l.55-.475q-.05-.35-.05-.65t.05-.65l-.55-.475q-.275-.225-.325-.563t.125-.637l.225-.375q.175-.275.475-.4t.625-.025l.725.225q.275-.2.538-.338t.562-.262l.15-.725q.075-.35.338-.562T16.8 11h.4q.35 0 .613.225t.337.575l.15.7q.3.125.562.275t.538.375l.675-.225q.35-.125.675 0t.5.425l.2.35q.175.3.125.65t-.325.575l-.55.475q.05.3.05.625t-.05.625l.55.475q.275.225.325.563t-.125.637l-.225.375q-.175.275-.475.4t-.625.025L19.4 18.9q-.275.2-.538.337t-.562.263l-.15.725q-.075.35-.337.563T17.2 21h-.4q-.35 0-.612-.225t-.338-.575" />
                        </svg>
                        Gerir
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['cargo'] == 'professor' || $_SESSION['cargo'] == 'admin') : ?>
                <li class="rounded-lg px-3 py-2 hover:text-blue-500 ease-in duration-200 hover:cursor-pointer" aria-label="about">
                    <a href="<?= $path ?>post.php" class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 17h2v-4h4v-2h-4V7h-2v4H7v2h4zm1 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20m0-8" />
                        </svg>
                        Adicionar projeto
                    </a>
                </li>
            <?php endif; ?>

            <li class="rounded-lg px-3 py-2 hover:text-blue-500 ease-in duration-200 hover:cursor-pointer" aria-label="contact">
                <a href="<?= $actions_path ?>logout.php" class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                    </svg>
                    Logout
                </a>
            </li>

        </ul>
</nav>