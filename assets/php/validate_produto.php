<?php
require('connection.php');

$nome = filter_input(INPUT_POST, 'product-name', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'product-category');
$tamanho = filter_input(INPUT_POST, 'produto-tamanho');
$cor = filter_input(INPUT_POST, 'product-color', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'product-price', FILTER_VALIDATE_FLOAT);
$estoque = filter_input(INPUT_POST, 'produto-estoque');
$descricao = filter_input(INPUT_POST, 'product-description');
$desconto = filter_input(INPUT_POST, 'product-discount');

try{
    if($nome && $categoria && $tamanho && $cor && $preco && $estoque != ""){

        if(isset($_FILES['product-img'])){
            $ext = strtolower(substr($_FILES['product-img']['name'], -4));
            $novo_nome = str_replace(' ', '_', $nome) . $ext;
            $dir = '../images/produtos/';
            move_uploaded_file($_FILES['product-img']['tmp_name'], $dir . $novo_nome); 
        }

        $stmt = $pdo->prepare("INSERT INTO produto (nome, tamanho, cor, preco, Estoque, descricao, categoria, Imagem, desconto) VALUES (:nome, :tamanho, :cor, :preco, :estoque, :descricao, :categoria, :Imagem, :desconto)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':Imagem', $novo_nome);
        $stmt->bindParam(':desconto', $desconto);
        $stmt->execute();

        echo "<script>alert('PRODUTO CADASTRADO COM SUCESSO');
        location.href='../admin/admin-page.php';</script>";
    } else {
        echo "ERRO AO CADASTRAR O PRODUTO";
    }
} catch(PDOException $e){
    echo "[ERRO]...: " . $e->getMessage();
}