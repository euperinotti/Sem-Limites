<?php
session_start();

if (isset($_SESSION['idusuario'])){
    error_reporting(1);
} else {
    error_reporting(0);
}
require('../../php/connection.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0" name="viewport" />
        <title>Produtos | Sem Limites</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../icons/icon-tab-03.svg">
        <link rel="stylesheet" href="../../css/male.css">
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <script src="../../js/hidden-menus.js"></script>
    </head>
<body>

<?php include('../../php/header.php');?>

<section id="male-section">
    <div class="male-section-top">
        <div class="male-section-top-left">
            <h1>PRODUTOS</h1>
        </div>

        <div class="male-section-top-right">
            <div class="male-section-top-right-filter" onclick="filterOpen()">
                <span>Filtros</span>
                <img src="../../icons/filter-icon.svg" alt="">
            </div>
        </div>
    </div>

    <aside id="aside-menu">
            <div class="aside-headline">
                <h2>FILTROS</h2>
            </div>
            <form action="filter.php?filter=s" method="post">
        <div class="aside-menu-options">
            <div class="aside-options"> 
                <div class="aside-options-container" id="aside-options-container">
                    <span>Tamanho</span>
                    <img src="../../icons/plus-icon.svg" class="aside-icon-open aside-img" id="open-icon-size" alt="" >
                    <div class="aside-suboptions-container">
                        <input type="radio" name="aside-size" value="GG"> GG <br>
                        <input type="radio" name="aside-size" value="G"> G <br>
                        <input type="radio" name="aside-size" value="M"> M <br>
                        <input type="radio" name="aside-size" value="P"> P <br>
                        <input type="radio" name="aside-size" value="38"> 38 <br>
                        <input type="radio" name="aside-size" value="39"> 39 <br>
                        <input type="radio" name="aside-size" value="40"> 40 <br>
                        <input type="radio" name="aside-size" value="10"> 41 <br>
                    </div>
                </div>
            </div>
            <div class="aside-options">
                <div class="aside-options-container">
                    <span>Categoria</span>
                    <img src="../../icons/plus-icon.svg" class="aside-icon-open aside-img" alt="" >
                    <div class="aside-suboptions-container">
                        <?php
                            $stmt = $pdo->prepare("SELECT * FROM categoria");
                            $stmt->execute();
                            $categoria = $stmt->fetchAll();
                            foreach ($categoria as $cat):
                        ?>

                        <input type="radio" name="aside-cate" value="<?php echo $cat['idcategoria'];?>"> <?php echo $cat['nome']; ?> <br>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="aside-options">
                <div class="aside-options-container">
                    <span>Preço</span>
                    <img src="../../icons/plus-icon.svg" alt="" class="aside-icon-open aside-img">
                    <div class="aside-suboptions-container" >
                        
                        <input type="range" name="aside-range" id="aside-range" min="0" max="1000">
                        <div class="value">0</div>
                        <script>
                            const slider = document.getElementById("aside-range");
                            const value = document.querySelector(".value");
                            value.textContent = slider.value;
                            slider.oninput = function(){
                                value.textContent = this.value;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const acc = document.getElementsByClassName('aside-icon-open');
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener('click', function(){
                    this.classList.toggle('active');

                    var asideSubMenu = this.nextElementSibling;
                    if (asideSubMenu.style.display === "block") {
                        asideSubMenu.style.display = "none";
                    } else {
                        asideSubMenu.style.display = "block";
                    }
                })
            }
        </script>
        <input type="submit" value="FILTRAR" class="filter-btn">
        </form>
    </aside>

        <div class="male-section-container">
            <?php
            $pesquisa = "%" . trim($_GET['search']) . "%";
            if(isset($pesquisa)) {
                $stmtp = $pdo->prepare("SELECT * FROM produto WHERE nome LIKE :nome");
                $stmtp->bindParam(':nome', $pesquisa, PDO::PARAM_STR);
                $stmtp->execute();
                $sproduto = $stmtp->fetchAll(PDO::FETCH_ASSOC);
                if($stmtp->rowCount() > 0) {

                    foreach($sproduto as $sp): ?>
                        <a href="product-description.php?id=<?php echo $sp['idproduto'] . "&name=" . $sp['nome']; ?>">
                        <div class="male-section-box">
                            <div class="male-section-box-top">
                                <?php echo "<img src='../../images/produtos/" . $sp['Imagem'] . "'>";?>
                            </div>
                            <div class="male-section-box-bottom">
                                    <h1><?php echo $sp['nome'];?></h1>
                                    <span><?php 
                                    if($sp['desconto'] > 0){
                                        $porc = ($sp['desconto'] * $sp['preco']) / 100;
                                        $preco = $sp['preco'] - $porc;
                                        echo "R$ " . $preco . " · " . $sp['tamanho'];
                                    } else {
                                        echo "R$ " . $sp['preco'] . " · " . $sp['tamanho'];
                                    }
                                    ?></span>
                            </div>
                        </div>  
                        </a>            
                    <?php endforeach; 
                            }else{
                                echo "NENHUM PRODUTO ENCONTRADO";
                            }}
                            ?>
        </div>
    
</section>


<footer>
        <div id="footer">
            <div class="footer-left-side">
                <div class="footer-logo">
                    <a href="../../../index.php">
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
                                <td><a href="../support/support.php">Atendimento ao cliente</a></td>
                            </tr>
                            <tr>
                                <td><a href="../support/faq.php">Dúvidas frequentes</a></td>
                            </tr>
                            <tr>
                                <td><a href="../support/table-sizes.php">Tabela de Tamanhos</a></td>
                            </tr>
                            <tr>
                                <td><a href="../support/delivery-freight.php">Entregas e frete</a></td>
                            </tr>
                            <tr>
                                <td><a href="../support/payment-options.php">Opções de pagamento</a></td>
                            </tr>
                            <tr>
                                <td><a href="../support/refound.php">Troca e devolução</a></td>
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
                                <td><a href="../support/about-us.php">Sobre nós</a></td>
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
                                                <path class="st0" d="M57.4,0h-54C1.5,0,0,1.5,0,3.4v54c0,1.9,1.5,3.4,3.4,3.4h29.1V37.2h-7.9V28h7.9v-6.8c0-7.8,4.8-12.1,11.8-12.1c3.4,0,6.2,0.3,7.1,0.4v8.2h-4.9c-3.8,0-4.5,1.8-4.5,4.5V28h9l-1.2,9.2h-7.9v23.5h15.5c1.9,0,3.4-1.5,3.4-3.4v-54C60.7,1.5,59.2,0,57.4,0z" />
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
                                            <path class="st0" d="M373.4,0H138.6C62.2,0,0,62.2,0,138.6v234.8C0,449.8,62.2,512,138.6,512h234.8c76.4,0,138.6-62.2,138.6-138.6V138.6C512,62.2,449.8,0,373.4,0z M482,373.4c0,59.9-48.7,108.6-108.6,108.6H138.6C78.7,482,30,433.3,30,373.4V138.6C30,78.7,78.7,30,138.6,30h234.8C433.3,30,482,78.7,482,138.6V373.4z" />
                                            <path class="st0" d="M256,116c-77.2,0-140,62.8-140,140s62.8,140,140,140s140-62.8,140-140S333.2,116,256,116z M256,366c-60.6,0-110-49.3-110-110c0-60.6,49.3-110,110-110c60.6,0,110,49.3,110,110C366,316.6,316.6,366,256,366z" />
                                            <path class="st0" d="M399.3,66.3c-22.8,0-41.4,18.6-41.4,41.4c0,22.8,18.6,41.4,41.4,41.4s41.4-18.6,41.4-41.4S422.2,66.3,399.3,66.3z M399.3,119c-6.3,0-11.4-5.1-11.4-11.4c0-6.3,5.1-11.4,11.4-11.4c6.3,0,11.4,5.1,11.4,11.4C410.7,113.9,405.6,119,399.3,119z" />
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
                                                    <path class="st0" d="M512,97.2c-19,8.4-39.3,13.9-60.5,16.6c21.8-13,38.4-33.4,46.2-58c-20.3,12.1-42.7,20.6-66.6,25.4C411.9,60.7,384.4,48,354.5,48c-58.1,0-104.9,47.2-104.9,105c0,8.3,0.7,16.3,2.4,23.9c-87.3-4.3-164.5-46.1-216.4-109.8c-9.1,15.7-14.4,33.7-14.4,53.1c0,36.4,18.7,68.6,46.6,87.2c-16.9-0.3-33.4-5.2-47.4-12.9c0,0.3,0,0.7,0,1.2c0,51,36.4,93.4,84.1,103.1c-8.5,2.3-17.9,3.5-27.5,3.5c-6.7,0-13.5-0.4-19.9-1.8c13.6,41.6,52.2,72.1,98.1,73.1c-35.7,27.9-81.1,44.8-130.1,44.8c-8.6,0-16.9-0.4-25.1-1.4c46.5,30,101.6,47.1,161,47.1c193.2,0,298.8-160,298.8-298.7c0-4.6-0.2-9.1-0.4-13.6C480.2,137,497.7,118.5,512,97.2z" />
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
                        <p>Copyright©2020, Sem Limites LTDA. Todos os direitos reservados. Todos os textos, imagens,
                            gráficos, animações, vídeos, músicas, sons e outros materiais são protegidos por direitos
                            autorais e outros direitos de propriedade intelectual pertencentes à Sem Limites LTDA, suas
                            subsidiárias, afiliadas e licenciantes.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
</footer>
    
    <div id="credits-footer">
        <p class="credits-text">Criado por: <span>Guilherme Perinotti</span> e <span>Leonardo Prodosimo.</span> <br>4ºA
            Informática - CEEP
    </div>


    
</body>
</html>