<?php
session_start();
 if(isset($_SESSION['idadmin'])){
    error_reporting(1);
} else {
    header("Location: admin-login.php");
}
    require ("../php/connection.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" name="viewport" />
    <title>Controle do Administrador | Sem Limites</title>
    <link rel="shortcut icon" type="image/x-icon" href="../icons/icon-tab-03.svg">
    <link rel="stylesheet" href="../css/admin-page.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">

    <script>
        function mask_cpf(){
            var cpf = document.getElementById('client-cpf');
            if(cpf.value.length == 3 || cpf.value.length == 7 ){
                cpf.value += "."
            } else if (cpf.value.length == 11) {
                cpf.value += "-"
            }
        }

        function mask_tel(){
            var tel = document.getElementById('client-number');
            if(tel.value.length == 5) {
                tel.value += "-"
            }
        }
    </script>
</head>
<body>
    
<header>
        <div id="container">
            <div id="container-left-side">
                <a href="../../index.php">
                    <div id="logo">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500"
                            style="enable-background:new 0 0 500 500;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                    fill: #FFFFFF;
                                }
                            </style>
                            <g id="Artboard2">
                                <g id="Logo">
                                    <g id="_2849156474848">
                                        <polygon class="st0" points="473,185 249.9,499.2 412.6,0.8 			" />
                                        <polygon class="st0" points="27,185.4 249.9,499.2 87.2,0.8 			" />
                                        <polygon class="st0"
                                            points="310.6,124.2 249.4,39.5 189.2,124.2 189.2,124.2 249.4,308.5 			" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </a>
                <div id="header-options">
                    <ul>
                        <li><a href="../website/catalog/male.php">PRODUTOS</a></li>
                        <li><a href="../website/support/about-us.php">SOBRE NÓS</a></li>
                        <li><a href="../website/support/faq.php">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div id="container-right-side">
                <div id="profile-cart">
                    <a href="../website/user/login-page.php" target="_blank">
                        <div id="profile-icon">
                            <svg version="1.1" id="Camada_1" focusable="false" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 512"
                                style="enable-background:new 0 0 448 512;" xml:space="preserve">
                                <style type="text/css">
                                    .st0 {
                                        fill: #FFFFFF;
                                    }
                                </style>
                                <path class="st0"
                                    d="M313.6,304c-28.7,0-42.5,16-89.6,16s-60.8-16-89.6-16C60.2,304,0,364.2,0,438.4V464c0,26.5,21.5,48,48,48h352
                                c26.5,0,48-21.5,48-48v-25.6C448,364.2,387.8,304,313.6,304z M400,464H48v-25.6c0-47.6,38.8-86.4,86.4-86.4c14.6,0,38.3,16,89.6,16
                                c51.7,0,74.9-16,89.6-16c47.6,0,86.4,38.8,86.4,86.4V464z M224,288c79.5,0,144-64.5,144-144S303.5,0,224,0S80,64.5,80,144
                                S144.5,288,224,288z M224,48c52.9,0,96,43.1,96,96s-43.1,96-96,96s-96-43.1-96-96S171.1,48,224,48z" />
                            </svg>
                        </div>
                    </a>
                    <a href="../website/user/cart.php" target="_blank">
                        <div id="cart-icon">
                            <svg version="1.1" id="Camada_1" focusable="false" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 576 512"
                                style="enable-background:new 0 0 576 512;" xml:space="preserve">
                                <style type="text/css">
                                    .cart-icon-svg {
                                        fill: #FFFFFF;
                                    }
                                </style>
                                <path class="cart-icon-svg"
                                    d="M528.1,301.3l47.3-208c3.4-15-8-29.3-23.4-29.3H159.2L150,19.2C147.8,8,137.9,0,126.5,0H24C10.7,0,0,10.7,0,24
                                v16c0,13.3,10.7,24,24,24h69.9l70.2,343.4c-16.8,9.7-28.1,27.8-28.1,48.6c0,30.9,25.1,56,56,56s56-25.1,56-56
                                c0-15.7-6.4-29.8-16.8-40h209.6c-10.4,10.2-16.8,24.3-16.8,40c0,30.9,25.1,56,56,56s56-25.1,56-56c0-22.2-12.9-41.3-31.6-50.4
                                l5.5-24.3c3.4-15-8-29.3-23.4-29.3H218.1l-6.5-32h293.1C515.9,320,525.6,312.2,528.1,301.3z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <form action="######" id="form-search-bar">
                    <div id="search-bar">
                        <input type="search" name="search" id="search" placeholder="Buscar...">
                        <button type="submit">
                            <search-icon><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                                    class="svg-inline--fa fa-search fa-w-16" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#FFFFFF"
                                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                    </path>
                                </svg></search-icon>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</header>

<script>

    function cadastrarCliente(){
        var div = document.getElementById("aac-form");
        var button = document.querySelector(".cadastrarCliente");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function gerenciarCliente(){
        var div = document.getElementById("client-table");
        var button = document.querySelector(".gerenciarCliente");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function cadastrarProduto(){
        var div = document.getElementById("aap-form");
        var button = document.querySelector(".cadastrarProduto");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function gerenciarProduto(){
        var div = document.getElementById("product-table");
        var button = document.querySelector(".gerenciarProduto");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function cadastrarAdmin(){
        var div = document.getElementById("aaa-form");
        var button = document.querySelector(".cadastrarAdmin");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function gerenciarAdmin(){
        var div = document.getElementById("admin-table");
        var button = document.querySelector(".gerenciarAdmin");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function orderWait(){
        var div = document.getElementById("wait-table");
        var button = document.querySelector(".orderWait");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }

    function orderPayed(){
        var div = document.getElementById("payed-table");
        var button = document.querySelector(".orderPayed");

            if (div.style.display === 'block'){
                div.style.display = 'none';
            } else {
                div.style.display = 'block';
            }
    }
        
</script>

<div class="register-headline">
    <h1>CONTROLE DO ADMINISTRADOR</h1>
    <a href="../../index.php?acc=logout"><h1>Sair</h1></a>
</div>

<section class="main-menu">
    <div class="mm-client mm-area">
        <span>CLIENTES</span>
        <div class="mm-cl-icon mm-icon">
            <svg version="1.1" id="Camada_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 512" style="enable-background:new 0 0 448 512;" xml:space="preserve">
            <style type="text/css">
                .user{fill:#000000;}
            </style>
            <path class="user" d="M313.6,304c-28.7,0-42.5,16-89.6,16s-60.8-16-89.6-16C60.2,304,0,364.2,0,438.4V464c0,26.5,21.5,48,48,48h352
                c26.5,0,48-21.5,48-48v-25.6C448,364.2,387.8,304,313.6,304z M400,464H48v-25.6c0-47.6,38.8-86.4,86.4-86.4c14.6,0,38.3,16,89.6,16
                c51.7,0,74.9-16,89.6-16c47.6,0,86.4,38.8,86.4,86.4V464z M224,288c79.5,0,144-64.5,144-144S303.5,0,224,0S80,64.5,80,144
                S144.5,288,224,288z M224,48c52.9,0,96,43.1,96,96s-43.1,96-96,96s-96-43.1-96-96S171.1,48,224,48z"/>
            </svg>
        </div>
        <div class="mm-cl-buttons mm-buttons">
            <button class="gerenciarCliente" onclick="gerenciarCliente()">GERENCIAR</button>
            <button class="cadastrarCliente" onclick="cadastrarCliente()">CADASTRAR</button>
        </div>
    </div>

    <div class="mm-product mm-area">
        <span>PRODUTOS</span>
            <div class="mm-pr-icon mm-icon">
                <img src="../icons/product.svg" alt="Icone Produto">
            </div>
            <div class="mm-pr-buttons mm-buttons">
                <button class="gerenciarProduto" onclick="gerenciarProduto()">GERENCIAR</button></a>
                <button class="cadastrarProduto" onclick="cadastrarProduto()">CADASTRAR</button></a>
            </div>
    </div>

    <div class="mm-admin mm-area">
        <span>ADMINISTRADORES</span>
        <div class="mm-ad-icon mm-icon">
            <img src="../icons/user-admin.svg" alt="Icone Produto">
        </div>
        <div class="mm-ad-buttons mm-buttons">
            <button class="gerenciarAdmin" onclick="gerenciarAdmin()">GERENCIAR</button></a>
            <button class="cadastrarAdmin" onclick="cadastrarAdmin()">CADASTRAR</button></a>
        </div>
    </div>

    <div class="mm-order mm-area">
        <span>PEDIDOS</span>
        <div class="mm-or-icon mm-icon">
            <img src="../icons/order-icon.svg" alt="Icone Pedidos">
        </div>
        <div class="mm-or-buttons mm-buttons">
            <button class="orderPayed" onclick="orderPayed()">PAGOS</button></a>
            <button class="orderWait" onclick="orderWait()">A PAGAR</button></a>
        </div>
    </div>
</section>

<section class="admin-add-client">
    <form action="validate/validate-cliente.php" method="POST" id="aac-form">

        <div class="form-section">
            <h1 class="form-header"><strong>Cadastro de Cliente</strong></h1>
            <h1 class="form-header">Informações Básicas</h1>
            <div id="register-data" class="form-grid">
            <div class="register-name-box box-display">
                            <label for="register-nome">Nome</label>
                            <input type="text" name="client-name"
                            placeholder="Nome"  maxlength="45" class="input-box-2" required>
                    </div>

                    <div class="register-lastname-box box-display">
                            <label for="register-lastname">Sobrenome</label>
                            <input type="text" name="client-lastname" placeholder="Sobrenome" maxlength="45" class="input-box-2" required>
                    </div>

                    <div class="register-cpf-box box-display">
                        <label for="register-cpf">CPF</label>
                        <input type="text" id="client-cpf" name="client-cpf" placeholder="123.456.789-00" maxlength="14" class="input-box-1"  onkeyup="mask_cpf()" required>
                    </div>

                    <div class="register-email-box box-display">
                            <label for="register-email">Email</label>
                            <input type="email" placeholder="seu.email@exemplo.com" max="70" name="client-email" class="input-box-1" required>
                    </div>
    
                    <div class="register-password-box box-display">                  
                            <label for="password-register">Senha</label>
                            <input type="password" placeholder="Senha" maxlength="32" name="client-password" class="input-box-1" required>
                    </div>

                    <div class="register-ddd-box box-display">
                        <label for="register-ddd">DDD</label>
                        <input type="number" name="client-ddd" placeholder="045" maxlength="3"
                        class="input-box-4" autocomplete="off" required>
                    </div>

                    <div class="register-number-box box-display">
                            <label for="register-number">Telefone</label>
                            <input type="text" id="client-number" name="client-number" placeholder="99999-9999" maxlength="10"
                            class="input-box-4" autocomplete="off" onkeyup="mask_tel()" required>
                    </div>

                    <div class="register-pix-box box-display">
                        <label for="register-pix">Pix</label>
                        <input type="text" name="client-pix"
                        placeholder="Pix"  maxlength="50" class="input-box-2">
                    </div>
            </div>
        </div>

        <?php 
            $stmtb = $pdo->prepare("SELECT * FROM frete order by bairro");
            $stmtb->execute();
            if ($stmtb->rowCount() > 0) {
                $bairro = $stmtb->fetchAll();
            } else {
                echo "NENHUM BAIRRO FOI ENCONTRADO";
            }
        ?>
        
        <div class="form-section">
            <h1 class="form-header">Informações de Endereço</h1>
            <div id="register-address" class="form-grid">
                        <div class="register-street-box register-box-type1">
                                <label for="register-street">Rua</label>
                                <input type="street" name="client-street" maxlength="50" 
                                placeholder="Xavantes" class="input-box-1" required>
                        </div>

                        <div class="register-numhouse-box register-box-type2">
                                <label for="register-numhouse">N. Residência</label>
                                <input type="number" name="client-numhouse" placeholder="1234" min="0" max="9999" maxlength="4" class="input-box-2" required>
                        </div>

                        <div class="register-bairro-box register-box-type2">
                            <div class="register-bairro-headline register-input-title">
                                <label for="register-bairro-select">Bairro</label>
                            </div>
                            <div class="register-bairro-input">
                                <select id="register-bairro-select" class="input-box-2" name="client-bairro">
                                    <?php foreach($bairro as $ba): ?>
                                        <option value="<?php echo $ba['idfrete'];?>"><?php echo $ba['bairro'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
            </div>
        </div>

        <div class="register-submit-box">
            <input type="submit" value="Finalizar Cadastro do Cliente">
        </div>
    </form>

    <div class="client-table table-data" id="client-table">
        <?php 
            $cliente = [];
            $stmtc = $pdo->prepare("SELECT * FROM usuario WHERE tipo = :tipo order by idcliente");
            $stmtc->bindValue(':tipo', "C");
            $stmtc->execute();
            if($stmtc->rowCount() > 0) {
                $cliente = $stmtc->fetchAll();
            } else {
                echo "NENHUM CLIENTE FOI ENCONTRADO";
            }
        ?>
        <table>
            <tr class="thead">
                <td>Id</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Email</td>
                <td>CPF</td>
                <td>DDD</td>
                <td>Telefone</td>
                <td>Senha</td>
                <td>Rua</td>
                <td>N Casa</td>
                <td>Bairro</td>
                <td>Ações</td>
            </tr>
                <?php foreach($cliente as $cl): ?>
                <tr>
                    <td><?php echo $cl['idcliente'];?></td>
                    <td><?php echo $cl['nome'];?></td>
                    <td><?php echo $cl['sobrenome'];?></td>
                    <td><?php echo $cl['email'];?></td>
                    <td><?php echo $cl['cpf'];?></td>
                    <td><?php echo $cl['ddd'];?></td>
                    <td><?php echo $cl['telefone'];?></td>
                    <td><?php echo $cl['senha'];?></td>
                    <td><?php echo $cl['rua'];?></td>
                    <td><?php echo $cl['n_casa'];?></td>
                    <td><?php echo $cl['frete'];?></td>
                    <td><a href="../website/user/edit-profile.php?id=<?php echo $cl['idcliente'];?>">Editar</a> <br>
                    <a href="admin-page.php?idcliente=<?php echo $cl['idcliente'];?>&acc=delclient  " onclick="return confirm('TEM CERTEZA QUE DESEJA EXCLUIR ESTE USUÁRIO?')">Excluir</a>
                    </td>
                </tr>
                
                <?php endforeach; ?>

                <?php if($_GET['acc'] == 'delclient'){
                    $idcliente = $_GET['idcliente'];

                    $stmt = $pdo->prepare("DELETE FROM usuario WHERE idcliente = :idcliente");
                    $stmt->bindParam(':idcliente', $idcliente);
                    $stmt->execute();
                    echo "
                    <script>
                    alert('USUARIO EXCLUIDO COM SUCESSO');
                    location.href='admin-page.php';
                    </script>";

                } ?>
        </table>
    </div>
    
</section>

<?php 
    $stmtp = $pdo->prepare("SELECT * FROM produto order by idproduto");
    $stmtp->execute();
    if($stmtp->rowCount() > 0) {
        $produto = $stmtp->fetchAll();
    } else {
        echo "NENHUM PRODUTO FOI ENCONTRADO";
    }
?>

<section class="admin-add-product" id="aa-product">
    <form action="../php/validate_produto.php" method="POST" id="aap-form" enctype="multipart/form-data">
        <div class="form-section">
            <h1 class="form-header"><strong>Cadastro de Produto</strong></h1>
            <h1 class="form-header">Informações Básicas</h1>
            <div id="register-product-basic" class="form-grid">

                    <div class="register-product-name-box box-display">
                            <label for="product-name">Nome</label>
                            <input type="text" id="register-product-name" name="product-name"
                            placeholder="Nome"  maxlength="60" required>
                    </div>

                    <div class="register-prodcut-size-box box-display">
                            <label for="register-product-size">Tamanho (Alfabetico)</label>
                            <select id="register-product-size" name="produto-tamanho">
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                </select>   
                    </div>

                    <div class="register-product-color-box box-display">
                        <label for="register-product-color">Cor</label>
                        <input type="text" id="register-product-color" name="product-color" placeholder="Preto" maxlength="30" required>
                    </div>

                    <div class="register-gender-box">
                            <label for="produto-estoque">Estoque</label>
                            <div class="produto-esotque-box">
                                <input type="number" id="produto-estoque" name="produto-estoque" />
                            </div>
                    </div>
    
                    <div class="register-product-price-box box-display">                  
                            <label for="register-product-price-box">Preço</label>
                            <input type="text" id="register-product-price-box" placeholder="80" maxlength="30" name="product-price" step="0.01" required>
                    </div>

                    <div class="register-product-discount-box box-display">                  
                            <label for="register-product-discount-box">Desconto</label>
                            <input type="number" id="register-product-discount-box" placeholder="10" maxlength="3" name="product-discount" step="1" max="100" min="0" onkeydown="return false">
                    </div>

                    <?php 
                        $stmt = $pdo->prepare("SELECT * FROM categoria");
                        $stmt->execute();
                        $categoria = $stmt->fetchAll();        
                    ?>

                    <div class="register-product-category-box box-display">
                        <label for="register-produtct-category">Categoria</label>
                        <select name="product-category" id="register-category">
                            <?php 
                                foreach ($categoria as $cat):
                            ?>

                            <option value="<?php echo $cat['idcategoria'];?>"><?php echo $cat['nome']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="register-product-img-box box-display">                  
                            <label for="register-product-img-box">Imagem</label>
                            <input type="file" id="register-product-img-box"  name="product-img">
                    </div>
            </div>
        </div>

        <div class="form-section">
            <h1 class="form-header">Descrição do produto</h1>
            <div id="register-product-description">
                        <textarea name="product-description" placeholder="Utilize (??) para quebra de linha."></textarea>
            </div>
            <div class="register-submit-box">
                <input type="submit" id="register-product-submit" value="Finalizar Cadastro do Produto">
            </div>
        </div>
    </form>

    <div class="product-table table-data" id="product-table">
        <table>
            <tr class="thead">
                <td>Id</td>
                <td>Nome</td>
                <td>Tamanho</td>
                <td>Preço</td>
                <td>Desconto</td>
                <td>Imagem</td>
                <td>Cor</td>
                <td>Estoque</td>
                <td>Categoria</td>
                <td>Ações</td>
            </tr>
                <?php foreach($produto as $pr): ?>
                <tr>
                    <td><?php echo $pr['idproduto'];?></td>
                    <td><?php echo $pr['nome'];?></td>
                    <td><?php echo $pr['tamanho'];?></td>
                    <td><?php echo $pr['preco'];?></td>
                    <td><?php echo $pr['desconto'];?></td>
                    <td><?php echo $pr['Imagem'];?></td>
                    <td><?php echo $pr['cor'];?></td>
                    <td><?php echo $pr['Estoque'];?></td>
                    <td><?php echo $pr['categoria'];?></td>
                    <td><a href="edit-produto.php?id=<?php echo $pr['idproduto'];?>">Editar</a><br>
                    <a href="admin-page.php?idprod=<?php echo $pr['idproduto'];?>&acc=delprod" onclick="return confirm('TEM CERTEZA QUE DESEJA EXCLUIR ESTE PRODUTO?')">Excluir</a></td>
                </tr>
                
                <?php endforeach; ?>
        </table>
    </div>
    <?php
        if($_GET['acc'] == 'delprod'){
            $stmt = $pdo->prepare("DELETE FROM produto WHERE idproduto = :idproduto");
            $stmt->bindParam(':idproduto', $_GET['idprod']);
            $stmt->execute();

            echo "<script>
            alert('PRODUTO EXCLUIDO COM SUCESSO');
            location.href='admin-page.php';
            </script>";
        }
    ?>
</section>

<?php 
    $stmta = $pdo->prepare("SELECT * FROM usuario WHERE tipo = :tipo");
    $stmta->bindValue(':tipo', 'A');
    $stmta->execute();
    if($stmta->rowCount() > 0) {
        $admin = $stmta->fetchAll();
    } else {
        echo "NENHUM CLIENTE FOI ENCONTRADO";
    }
?>
<section class="admin-add-admin">
    <form action="validate/validate-admin.php" method="POST" id="aaa-form">

    <div class="form-section">
        <h1 class="form-header"><strong>Cadastro de Administrador</strong></h1>
        <h1 class="form-header">Informações Básicas</h1>
        <div id="register-data" class="form-grid">
        <div class="register-name-box box-display">
                        <label for="register-nome">Nome</label>
                        <input type="text" name="client-name"
                        placeholder="Nome"  maxlength="45" class="input-box-2" required>
                </div>

                <div class="register-lastname-box box-display">
                        <label for="register-lastname">Sobrenome</label>
                        <input type="text" name="client-lastname" placeholder="Sobrenome" maxlength="45" class="input-box-2" required>
                </div>

                <div class="register-cpf-box box-display">
                    <label for="register-cpf">CPF</label>
                    <input type="text" id="client-cpf" name="client-cpf" placeholder="123.456.789-00" maxlength="14" class="input-box-1"  onkeyup="mask_cpf()" required>
                </div>

                <div class="register-email-box box-display">
                        <label for="register-email">Email</label>
                        <input type="email" placeholder="seu.email@exemplo.com" max="70" name="client-email" class="input-box-1" required>
                </div>

                <div class="register-password-box box-display">                  
                        <label for="password-register">Senha</label>
                        <input type="password" placeholder="Senha" maxlength="32" name="client-password" class="input-box-1" required>
                </div>

                <div class="register-ddd-box box-display">
                    <label for="register-ddd">DDD</label>
                    <input type="number" name="client-ddd" placeholder="045" maxlength="3"
                    class="input-box-4" autocomplete="off" required>
                </div>

                <div class="register-number-box box-display">
                        <label for="register-number">Telefone</label>
                        <input type="text" id="client-number" name="client-number" placeholder="99999-9999" maxlength="10"
                        class="input-box-4" autocomplete="off" onkeyup="mask_tel()" required>
                </div>
        </div>
    </div>

    <div class="form-section">
            <h1 class="form-header">Informações de Endereço</h1>
            <div id="register-address" class="form-grid">
                        <div class="register-street-box register-box-type1">
                                <label for="register-street">Rua</label>
                                <input type="street" name="client-street" maxlength="50" 
                                placeholder="Xavantes" class="input-box-1" required>
                        </div>

                        <div class="register-numhouse-box register-box-type2">
                                <label for="register-numhouse">N. Residência</label>
                                <input type="number" name="client-numhouse" placeholder="1234" min="0" max="9999" maxlength="4" class="input-box-2" required>
                        </div>

                        <div class="register-bairro-box register-box-type2">
                            <div class="register-bairro-headline register-input-title">
                                <label for="register-bairro-select">Bairro</label>
                            </div>
                            <div class="register-bairro-input">
                                <select id="register-bairro-select" class="input-box-2" name="client-bairro">
                                    <?php foreach($bairro as $ba): ?>
                                        <option value="<?php echo $ba['idfrete'];?>"><?php echo $ba['bairro'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
            </div>
        </div>

        <div class="register-submit-box">
            <input type="submit" value="Finalizar Cadastro de Admin">
        </div>
    </form>

    <?php 
        $admin = [];
        $stmta = $pdo->prepare("SELECT * FROM usuario WHERE tipo = :tipo order by idcliente");
        $stmta->bindValue(':tipo', "A");
        $stmta->execute();
        if($stmta->rowCount() > 0) {
            $admin = $stmta->fetchAll();
        } else {
            echo "NENHUM CLIENTE FOI ENCONTRADO";
        }
        ?>

    <div class="client-table table-data" id="admin-table">
        <table>
            <tr class="thead">
                <td>Id</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Email</td>
                <td>CPF</td>
                <td>DDD</td>
                <td>Telefone</td>
                <td>Senha</td>
                <td>Rua</td>
                <td>N Casa</td>
                <td>Bairro</td>
                <td>Ações</td>
            </tr>
                <?php foreach($admin as $ad): ?>
                <tr>
                    <td><?php echo $ad['idcliente'];?></td>
                    <td><?php echo $ad['nome'];?></td>
                    <td><?php echo $ad['sobrenome'];?></td>
                    <td><?php echo $ad['email'];?></td>
                    <td><?php echo $ad['cpf'];?></td>
                    <td><?php echo $ad['ddd'];?></td>
                    <td><?php echo $ad['telefone'];?></td>
                    <td><?php echo $ad['senha'];?></td>
                    <td><?php echo $ad['rua'];?></td>
                    <td><?php echo $ad['n_casa'];?></td>
                    <td><?php echo $ad['frete'];?></td>
                    <td><a href="../website/user/edit-profile.php?id=<?php echo $ad['idcliente'];?>">Editar</a><br>
                <a href="admin-page.php?idadmin=<?php echo $ad['idcliente'];?>&acc=deladmin" onclick="return confirm('TEM CERTEZA QUE DESEJA EXCLUIR ESTE USUÁRIO?')">Excluir</td>
                </tr>
                <?php endforeach; ?>

                <?php if($_GET['acc'] == 'deladmin'){
                    $idadmin = $_GET['idadmin'];
                    $tipo = 'A';

                    $stmt = $pdo->prepare("DELETE FROM usuario WHERE idcliente = :idcliente AND tipo = :tipo");
                    $stmt->bindParam(':idcliente', $idadmin);
                    $stmt->bindParam(':tipo', $tipo);
                    $stmt->execute();
                    echo "
                    <script>
                    alert('ADMINISTRADOR EXCLUIDO COM SUCESSO');
                    location.href='admin-page.php';
                    </script>";

                } ?>
        </table>
    </div>
</section>

<section class="admin-order">
    <?php

        $pago = "PAGO";
        $stmt = $pdo->prepare("SELECT * FROM pedido WHERE situacao = :situacao");
        $stmt->bindParam(':situacao',$pago);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $pedido = $stmt->fetchAll();
        }

    ?>
    <div class="ao-payed">
        <div class="payed-orders">
        <div class="payed-table table-data" id="payed-table">
        <div class="payed-title">
            <h1 class="form-header">PEDIDOS PAGOS</h1>
        </div>
        <?php foreach($pedido as $ped): ?>
            <form action="admin-page.php?acc=update-pedido&id=<?php echo $ped['idPedido']; ?>" method="POST">
        <table>
            <tr class="thead">
                <td>Id Pedido</td>
                <td>Id Cliente</td>
                <td>Data</td>
                <td>Valor Total</td>
                <td>Pagamento</td>
                <td>Observação</td>
                <td>Situação</td>
                <td>Ação</td>
            </tr>
                <tr>
                    <td><?php echo $ped['idPedido'];?></td>
                    <td><?php echo $ped['usuario'];?></td>
                    <td><?php echo $ped['dataPedido'];?></td>
                    <td><?php echo "R$ " . $ped['valorPedido'];?></td>
                    <td><?php echo $ped['forma_pag'];?></td>
                    <td><?php echo $ped['observacao'];?></td>
                    <td><input type="radio" name="situacao" value="A PAGAR" <?php if($ped['situacao'] == "A PAGAR"){
                        echo "checked";
                    } ?>><label>A PAGAR</label>
                    <br>
                    <input type="radio" name="situacao" value="PAGO" <?php if($ped['situacao'] == "PAGO"){
                        echo "checked";
                    } ?>><label>PAGO</label>
                    <td>
                    <td><a href="">EXCLUIR</a></td>
                </tr>
        </table>
        <input type="submit" value="SALVAR ALTERAÇÕES">
        </form>
        <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php

        $aPagar = "A PAGAR";
        $stmt = $pdo->prepare("SELECT * FROM pedido WHERE situacao = :situacao");
        $stmt->bindParam(':situacao',$aPagar);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $pedA = $stmt->fetchAll();
        }

    ?>
    <div class="ao-wait">
        <div class="wait-orders">
        <div class="wait-table table-data" id="wait-table">
        <div class="wait-title">
            <h1 class="form-header">PEDIDOS A PAGAR</h1>
        </div>
        <?php foreach($pedA as $apag): ?>
            <form action="admin-page.php?acc=update-pedido&id=<?php echo $apag['idPedido']; ?>" method="POST">
        <table>
            <tr class="thead">
                <td>Id Pedido</td>
                <td>Id Cliente</td>
                <td>Data</td>
                <td>Valor Total</td>
                <td>Pagamento</td>
                <td>Observação</td>
                <td>Situação</td>
                <td>Ação</td>
            </tr>
                <tr>
                    <td><?php echo $apag['idPedido'];?></td>
                    <td><?php echo $apag['usuario'];?></td>
                    <td><?php echo $apag['dataPedido'];?></td>
                    <td><?php echo "R$ " . $apag['valorPedido'];?></td>
                    <td><?php echo $apag['forma_pag'];?></td>
                    <td><?php echo $apag['observacao'];?></td>
                    <td><input type="radio" name="situacao" value="A PAGAR" <?php if($apag['situacao'] == "A PAGAR"){
                        echo "checked";
                    } ?>><label>A PAGAR</label>
                    <br>
                    <input type="radio" name="situacao" value="PAGO" <?php if($apag['situacao'] == "PAGO"){
                        echo "checked";
                    } ?>><label>PAGO</label>
                    <td><a href="admin-page.php?acc=del-pedido&id=<?php echo $apag['idPedido']; ?>">EXCLUIR</a></td>
                </tr>
        </table>
        <input type="submit" value="SALVAR ALTERAÇÕES">
        <?php endforeach; ?>
        </form>
            </div>
        </div>
    </div>
</section>

<?php
    if($_GET['acc'] == "update-pedido"){
        $situacao = $_POST['situacao'];
        $stmt = $pdo->prepare("UPDATE pedido SET situacao = :situacao WHERE idPedido = :idpedido");
        $stmt->bindParam(':idpedido', $_GET['id']);
        $stmt->bindParam(':situacao', $situacao);
        if($stmt->execute()){
            echo "<script>alert('A SITUAÇÃO DO PEDIDO [ID]: " . $_GET['id'] . " FOI ALTERADA PARA [" . $situacao . "]');
            location.href='admin-page.php';</script>";
        }
    }
?>


<footer>
    <div id="footer">
        <div class="footer-left-side"> 
                <div class="footer-logo">
                    <a href="../../index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 140">
                            <defs>
                                <style>
                                    .cls-1 {
                                        font-size: 93.82px;
                                        font-family: AirsideSans-Regular, Airside Sans;
                                    }

                                    .cls-1,
                                    .cls-2 {
                                        fill: #fff;
                                    }

                                    .cls-2 {
                                        fill-rule: evenodd;
                                    }
                                </style>
                            </defs>
                            <title>sem limites logo 4 white</title>
                            <g id="Artboard2"><text class="cls-1" transform="translate(168.6 107.67) scale(1.05 1)">SEM
                                    LIMITES</text>
                                <g id="Logo">
                                    <g id="_2849156474848" data-name=" 2849156474848">
                                        <polygon class="cls-2" points="130.29 53.04 70.11 135 113.99 5 130.29 53.04" />
                                        <polygon class="cls-2" points="10 53.14 70.11 135 26.23 5 10 53.14" />
                                        <polygon class="cls-2"
                                            points="86.48 37.2 69.97 15.1 53.74 37.2 53.74 37.2 69.97 85.25 86.48 37.2" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            <div class="footer-text-content">
                <table class="table-suporte table-footer">
                    <thead>
                        <tr>
                            <th>Suporte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="../html/support.html">Atendimento ao cliente</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/faq.html">Dúvidas frequentes</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/table-sizes.html">Tabela de Tamanhos</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/delivery-freight.html">Entregas e frete</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/payment-options.html">Opções de pagamento</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/refound.html">Troca e devolução</a></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table-informacoes table-footer">
                    <thead>
                        <tr>
                            <th>Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="../html/about-us.html">Sobre nós</a></td>
                        </tr>
                        <tr>
                            <td><a href="../html/work-with-us.html">Trabalhe Conosco</a></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table-contato table-footer">
                    <thead>
                        <tr>
                            <th>Contato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Telefone: (45) 98818-4081</td>
                        </tr>
                        <tr>
                            <td>Cascavel - PR</td>
                        </tr>
                        <tr>
                            <td>Rua Xavantes 1777, Santa Cruz</td>
                        </tr>
                        <tr>
                            <td>semlimitesstore@outlook.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>         
        </div>

        <div class="footer-right-side">
            <div class="footer-white-bar"></div>
            <div class="footer-social-media-container">
                <div class="footer-social-media-headline">
                    <div class="headline-box">
                        <h1>Siga nossas redes sociais</h1>
                    </div>
                </div>

                    <div class="footer-social-media-box">
                        <div class="footer-social-media-area">

                            <a href="https://www.facebook.com/" target="_blank">
                                <div class="footer-social-media">
                                    <div class="footer-social-icon">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 60.7 60.7" style="enable-background:new 0 0 60.7 60.7;"
                                            xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #FFFFFF;
                                                }
                                            </style>
                                            <g>
                                                <path class="st0" d="M57.4,0h-54C1.5,0,0,1.5,0,3.4v54c0,1.9,1.5,3.4,3.4,3.4h29.1V37.2h-7.9V28h7.9v-6.8c0-7.8,4.8-12.1,11.8-12.1
        c3.4,0,6.2,0.3,7.1,0.4v8.2h-4.9c-3.8,0-4.5,1.8-4.5,4.5V28h9l-1.2,9.2h-7.9v23.5h15.5c1.9,0,3.4-1.5,3.4-3.4v-54
        C60.7,1.5,59.2,0,57.4,0z" />
                                            </g>
                                        </svg>
                                    </div>
                                <div class="footer-social-text">
                                    <p>Sem Limites</p>
                                </div>
                            </div>
                            </a>

                            <a href="https://www.instagram.com/" target="_blank">
                                <div class="footer-social-media">
                                    <div class="footer-social-icon">
                                            <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                            xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #FFFFFF;
                                                }
                                            </style>
                                            <path class="st0" d="M373.4,0H138.6C62.2,0,0,62.2,0,138.6v234.8C0,449.8,62.2,512,138.6,512h234.8c76.4,0,138.6-62.2,138.6-138.6
    V138.6C512,62.2,449.8,0,373.4,0z M482,373.4c0,59.9-48.7,108.6-108.6,108.6H138.6C78.7,482,30,433.3,30,373.4V138.6
    C30,78.7,78.7,30,138.6,30h234.8C433.3,30,482,78.7,482,138.6V373.4z" />
                                            <path class="st0" d="M256,116c-77.2,0-140,62.8-140,140s62.8,140,140,140s140-62.8,140-140S333.2,116,256,116z M256,366
    c-60.6,0-110-49.3-110-110c0-60.6,49.3-110,110-110c60.6,0,110,49.3,110,110C366,316.6,316.6,366,256,366z" />
                                            <path class="st0" d="M399.3,66.3c-22.8,0-41.4,18.6-41.4,41.4c0,22.8,18.6,41.4,41.4,41.4s41.4-18.6,41.4-41.4
    S422.2,66.3,399.3,66.3z M399.3,119c-6.3,0-11.4-5.1-11.4-11.4c0-6.3,5.1-11.4,11.4-11.4c6.3,0,11.4,5.1,11.4,11.4
    C410.7,113.9,405.6,119,399.3,119z" />
                                        </svg>
                                    </div>
                                <div class="footer-social-text">
                                    <p>Sem Limites</p>
                                </div>
                            </div>
                            </a>

                            <a href="https://www.twitter.com/" target="_blank">
                                <div class="footer-social-media">
                                    <div class="footer-social-icon">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                            xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #FFFFFF;
                                                }
                                            </style>
                                            <g>
                                                <g>
                                                    <path class="st0" d="M512,97.2c-19,8.4-39.3,13.9-60.5,16.6c21.8-13,38.4-33.4,46.2-58c-20.3,12.1-42.7,20.6-66.6,25.4
            C411.9,60.7,384.4,48,354.5,48c-58.1,0-104.9,47.2-104.9,105c0,8.3,0.7,16.3,2.4,23.9c-87.3-4.3-164.5-46.1-216.4-109.8
            c-9.1,15.7-14.4,33.7-14.4,53.1c0,36.4,18.7,68.6,46.6,87.2c-16.9-0.3-33.4-5.2-47.4-12.9c0,0.3,0,0.7,0,1.2
            c0,51,36.4,93.4,84.1,103.1c-8.5,2.3-17.9,3.5-27.5,3.5c-6.7,0-13.5-0.4-19.9-1.8c13.6,41.6,52.2,72.1,98.1,73.1
            c-35.7,27.9-81.1,44.8-130.1,44.8c-8.6,0-16.9-0.4-25.1-1.4c46.5,30,101.6,47.1,161,47.1c193.2,0,298.8-160,298.8-298.7
            c0-4.6-0.2-9.1-0.4-13.6C480.2,137,497.7,118.5,512,97.2z" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                <div class="footer-social-text">
                                    <p>Sem Limites</p>
                                </div>
                            </div>
                            </a>


                        </div>
                    </a>
                    </div>
                    <div class="footer-disclaimer-copyright">
                        <p>Copyright©2020, Sem Limites LTDA. Todos os direitos reservados. Todos os textos, imagens, gráficos, animações, vídeos, músicas, sons e outros materiais são protegidos por direitos autorais e outros direitos de propriedade intelectual pertencentes à Sem Limites LTDA, suas subsidiárias, afiliadas e licenciantes.</p>
                    </div>
            </div>
        </div>
    </div>
    </div>
</footer>
    <div id="credits-footer">
        <p class="credits-text">Criado por: <span>Guilherme Perinotti</span> e <span>Leonardo Prodosimo.</span> <br>4ºA Informática - CEEP        
    </div> 
</body>
</html>