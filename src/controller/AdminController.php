<?php

$_POST = null;

switch ($_POST) {

    case isset($_POST["btnPainelHome"]):
        include_once "./../view/AdminHomeView.php";
        break;
    case isset($_POST["btnPainelProdutos"]):
        include_once "./../view/AdminProdutoView.php";
        break;
    case isset($_POST["btnPainelPedidos"]):
        include_once "./../view/AdminPedidoView.php";
        break;
}
