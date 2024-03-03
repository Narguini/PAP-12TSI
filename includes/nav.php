<nav class="navtop">
			<div>
				<h1>Avaliação de PAPs</h1>
                <a href="home.php"><i class="fa-solid fa-home"></i></a>

            <?php if($_SESSION['cargo'] == 'admin') :?>
                <a href="#"><i class="fa-solid fa-plus"></i>Manage</a>
            <?php endif; ?>

            <?php if($_SESSION['cargo'] == 'professor' || $_SESSION['cargo'] == 'admin') :?>
                <a href="post.php"><i class="fa-solid fa-plus"></i>Novo projeto</a>
            <?php endif; ?>

				<a href="actions/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>



</nav>