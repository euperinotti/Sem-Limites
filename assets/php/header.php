<header>
    <div id="container">
        <div id="container-left-side">
            <a href="index.php">
                <div id="logo">
                    <img src="assets/logo/icon-logo.svg" alt="Logo Sem Limites">
                </div>
            </a>
            <div id="header-options">
                <ul>
                    <li><a href="assets/website/catalog/male.php">PRODUTOS</a></li>
                    <li><a href="assets/website/support/about-us.php">SOBRE NÓS</a></li>
                    <li><a href="assets/website/support/faq.php">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div id="container-right-side">
            <div id="profile-cart">
                
                    <a href="../website/user/<?php if(!$_SESSION['idusuario']){
                        echo 'login-page.php';
                    } else {
                        echo "profile-page.php?id={$_SESSION['idusuario']}";
                    } ?>" target="_blank">
                    <div id="profile-icon">
                        <svg version="1.1" id="Camada_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 448 512" style="enable-background:new 0 0 448 512;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #FFFFFF;
                                }
                            </style>
                            <path class="st0" d="M313.6,304c-28.7,0-42.5,16-89.6,16s-60.8-16-89.6-16C60.2,304,0,364.2,0,438.4V464c0,26.5,21.5,48,48,48h352
                            c26.5,0,48-21.5,48-48v-25.6C448,364.2,387.8,304,313.6,304z M400,464H48v-25.6c0-47.6,38.8-86.4,86.4-86.4c14.6,0,38.3,16,89.6,16
                            c51.7,0,74.9-16,89.6-16c47.6,0,86.4,38.8,86.4,86.4V464z M224,288c79.5,0,144-64.5,144-144S303.5,0,224,0S80,64.5,80,144
                            S144.5,288,224,288z M224,48c52.9,0,96,43.1,96,96s-43.1,96-96,96s-96-43.1-96-96S171.1,48,224,48z" />
                        </svg>
                    </div>
                </a>
                <a href="../website/user/cart.php" target="_blank">
                    <div id="cart-icon">
                        <svg version="1.1" id="Camada_1" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 576 512" style="enable-background:new 0 0 576 512;" xml:space="preserve">
                            <style type="text/css">
                                .cart-icon-svg {
                                    fill: #FFFFFF;
                                }
                            </style>
                            <path class="cart-icon-svg" d="M528.1,301.3l47.3-208c3.4-15-8-29.3-23.4-29.3H159.2L150,19.2C147.8,8,137.9,0,126.5,0H24C10.7,0,0,10.7,0,24
                            v16c0,13.3,10.7,24,24,24h69.9l70.2,343.4c-16.8,9.7-28.1,27.8-28.1,48.6c0,30.9,25.1,56,56,56s56-25.1,56-56
                            c0-15.7-6.4-29.8-16.8-40h209.6c-10.4,10.2-16.8,24.3-16.8,40c0,30.9,25.1,56,56,56s56-25.1,56-56c0-22.2-12.9-41.3-31.6-50.4
                            l5.5-24.3c3.4-15-8-29.3-23.4-29.3H218.1l-6.5-32h293.1C515.9,320,525.6,312.2,528.1,301.3z" />
                        </svg>
                    </div>
                </a>
            </div>
            <form action="../website/catalog/male.php" method="GET" id="form-search-bar">
                <div id="search-bar">
                    <input type="search" name="search" id="search" placeholder="Buscar...">
                    <button type="submit">
                        <search-icon><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#FFFFFF" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                </path>
                            </svg></search-icon>
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>