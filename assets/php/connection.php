<?php
$dbhost = "localhost";
$dbuser = "root";
$dbsenha = "";
$dbname = "semlimites";

try{
    $pdo = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbsenha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8");
} catch(PDOException $e) {
    echo "ERRO DE CONEXAO " . $e->getMessage();
}

return $pdo;
