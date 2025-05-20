<?php
$pagina = $_POST['pagina'] ?? 'btnHome';

switch ($pagina) {
    case 'btnHome':
        include_once __DIR__ . './index.php';
        break;

    case 'carrinho':
        include_once __DIR__ . '/../view/CarrinhoView.php';
        break;

    case 'login':
        include_once __DIR__ . '/../view/LoginView.php';
        break;

    case 'cadastro':
        include_once __DIR__ . '/../view/CadastroView.php';
        break;

    default:
        echo "<h2>Página não encontrada!</h2>";
}
