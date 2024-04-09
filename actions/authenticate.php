<?php

session_start();
include('../includes/connection.php');

if ( !isset($_POST['email'], $_POST['password']) ) {
	
	exit('Por favor preencha os dois campos');
}
if ($stmt = $conn->prepare('SELECT id, password, cargo FROM utilizadores WHERE email = ?')) {
	
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $cargo);
        $stmt->fetch();
        
        
        if (password_verify($_POST['password'], $password)) {
            
            
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['cargo'] = $cargo;
            header('Location: ../pages/home.php');
        } else {
            
            echo 'Nome ou password incorreta!';
        }
    } else {
        
        echo 'Nome ou password incorreta!';
    }

	$stmt->close();
}
?>