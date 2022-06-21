<?php
session_start();
require('connection.php');

date_default_timezone_set('America/Sao_Paulo');
$idusuario = $_SESSION['idusuario'];
$produto = $_SESSION['carrinho'];
$data = date("d/m/Y");
$formapag = filter_input(INPUT_POST, 'radio-pm');
$situacao = "A PAGAR";
$observacao = filter_input(INPUT_POST, 'buy-desc');

$stmtc = $pdo->prepare("SELECT * FROM usuario WHERE idcliente = :idcliente");
$stmtc->bindParam(':idcliente', $idusuario);
$stmtc->execute();
$cliente = $stmtc->fetch();

$stmtf = $pdo->prepare("SELECT * FROM frete WHERE idfrete = :idfrete");
$stmtf->bindParam(':idfrete', $cliente['frete']);
$stmtf->execute();
$frete = $stmtf->fetch();

$valortotal = $_SESSION['valor_total'];

try{
    $stmt = $pdo->prepare("INSERT INTO pedido (usuario, dataPedido, valorPedido, forma_pag, situacao, observacao) VALUES (:usuario, :dataPedido, :valorPedido, :forma_pag, :situacao, :observacao)");
    $stmt->bindParam(':usuario', $idusuario);
    $stmt->bindParam(':dataPedido', $data);
    $stmt->bindParam(':valorPedido', $valortotal);
    $stmt->bindParam(':forma_pag', $formapag);
    $stmt->bindParam(':situacao', $situacao);
    $stmt->bindParam(':observacao', $observacao);
    if($stmt->execute()){
        $id_last = $pdo->prepare("SELECT LAST_INSERT_ID()");
        $id_last->execute();
        $last_id = $id_last->fetchColumn();
        foreach ($_SESSION['carrinho'] as $produto=>$qntd){
            $stmt = $pdo->prepare("SELECT * FROM produto WHERE idproduto = :idproduto");
            $stmt->bindParam(':idproduto', $produto);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $pr = $stmt->fetch();
                $totalprod = $pr['preco'] * $qntd;
                $estoque = $pr['Estoque'] - $qntd;
                $stmt = $pdo->prepare("INSERT INTO produto_pedido (Pedido, Produto, qntdProduto, total_produto) VALUES (:Pedido, :Produto, :qntdProduto, :total_produto)");
                $stmt->bindParam(':Pedido', $last_id);
                $stmt->bindParam(':Produto', $produto);
                $stmt->bindParam(':qntdProduto', $qntd);
                $stmt->bindParam(':total_produto', $totalprod);
                if($stmt->execute()){
                    $stmt = $pdo->prepare("UPDATE produto SET Estoque = :estoque WHERE idproduto = :idproduto ");
                    $stmt->bindParam(':idproduto', $pr['idproduto']);
                    $stmt->bindParam(':estoque', $estoque);
                    $stmt->execute();
                    unset($_SESSION['carrinho']);
                    $_SESSION['carrinho'] = array();
                    echo "<script>
                    alert('SUA COMPRA FOI REGISTRADA COM SUCESSO. AGUARDAMOS O PAGAMENTO...');
                    location.href='../../index.php';
                    </script>";
                }
                
            }

        }
        
    }

} catch(PDOException $e) {
    echo "ERRO...: " . $e->getMessage();
}
