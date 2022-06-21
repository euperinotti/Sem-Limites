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
                        <img src="assets/icons/user-regular.svg" alt="Icone usuario">
                    </div>
                </a>
                <a href="../website/user/cart.php" target="_blank">
                    <div id="cart-icon">
                        <img src="assets/icons/shopping-cart-solid.svg" alt="Carrinho">
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
                            </svg>
                        </search-icon>
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>