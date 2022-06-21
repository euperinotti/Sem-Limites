<?php
session_start();

if (isset($_SESSION['idusuario'])){
    error_reporting(1);
} else {
    error_reporting(0);
}

if (isset($_SESSION['idadmin'])) {
    if(isset($_GET['acc']) == 'logout'){
        session_start();
        unset($_SESSION['idadmin']);
        session_destroy();
    }
}
?>