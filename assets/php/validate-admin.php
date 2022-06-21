<?php
require('connection.php');

$email = filter_input(INPUT_POST, 'admin-email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'admin-senha');
$tipo = "A";

if ($email && $senha != "") {
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha AND tipo = :tipo");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->execute();
    $admin = $stmt->fetch();

    if($stmt->rowCount() > 0) {
        session_start();
        $_SESSION['idadmin'] = $admin['idcliente'];
        $_SESSION['tipo'] = "admin";
        unset($_SESSION['idusuario']);

        if ($admin['tipo'] = "A"){
        header("Location: ../admin/admin-page.php");
        }
    } else {
        header("Location: ../admin/admin-login.php");
    }
} else {
    echo "[ERRO]...: NÃO FOI POSSIVEL COMUNICAR COM O BANCO OU FORAM INSERIDAS INFORMAÇÕES ERRADAS";
}