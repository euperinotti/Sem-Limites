<?php
session_start();
require('connection.php');

$email = filter_input(INPUT_POST, 'login-email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'login-password');

if ($email && $senha != "") {
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $usuario = $stmt->fetch();

    if($stmt->rowCount() > 0) {
        session_start();
        $_SESSION['idusuario'] = $usuario['idcliente'];
        $_SESSION['tipo'] = "cliente";
        $_SESSION['carrinho'] = array();

        echo "
        <script>
        alert('VOCÊ ESTÁ LOGADO');
        location.href='../../index.php';
        </script>";
        //$_SESSION['logged'] = True;

        echo "VOCE ESTA LOGADO";
    } else {
        echo "
        <script>
        alert('EMAIL OU SENHA INVÁLIDOS');
        location.href='../website/user/login-page.php';
        </script>";
    }
} else {
    echo "[ERRO]: ERRO AO COMPARAR DADOS COM O BANCO";
}

?>