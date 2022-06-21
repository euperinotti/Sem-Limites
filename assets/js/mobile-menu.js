function menuOpen(){
    let menu = document.getElementById("menu-list-container");

    if (menu.style.display == 'flex' ) {
        menu.style.display = 'none'
    } else {
        menu.style.display = 'flex'
    }

}