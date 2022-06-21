
function filterOpen() {
    let asideMenu = document.getElementById("aside-menu")
    let containerItem = document.getElementById("male-section-container")

    if(asideMenu.style.display == 'block') {
        asideMenu.style.display = 'none';
        containerItem.style.width = '100%'

    } else {
        asideMenu.style.display = 'block'
        containerItem.style.width = '80%'
    }
}

function orderOpen() {
    let iconOpen = document.getElementById("order-options");
    let menuIcon = document.getElementById("order-menu");

    if(iconOpen.style.display == 'block') {
        iconOpen.style.display = 'none';
        menuIcon.style.transform = 'rotate(0deg)';
        menuIcon.style.transition = '350ms';
    } else {
        iconOpen.style.display = 'block';
        menuIcon.style.transform = 'rotate(180deg)';
        menuIcon.style.transition = '350ms';
    }
}

