<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praia das Pulseiras - E-commerce</title>
    <link rel="stylesheet" href="/public/style.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">🏖️ Praia das Pulseiras</div>
            <ul class="nav-links">
                <li><a href="#home">Início</a></li>
                <li><a href="#products">Produtos</a></li>
                <li><a href="#about">Sobre</a></li>
                <li><a href="#contact">Contato</a></li>
            </ul>
            <div class="cart-icon" onclick="openCart()">
                🛒
                <span class="cart-count" id="cartCount">0</span>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Pulseiras Artesanais da Praia</h1>
            <p>Descubra nossa coleção exclusiva de pulseiras feitas à mão com materiais naturais</p>
            <a href="#products" class="btn">Ver Produtos</a>
        </div>
    </section>

    <?PHP
    require __DIR__ . "/src/controller/ProdutoController.php";
    $produtoController = new ProdutoController();
    $produtoController->exibirCatalogo();

    ?>

    <!-- Cart Modal -->
    <div id="cartModal" class="cart-modal">
        <div class="cart-content">
            <span class="close" onclick="closeCart()">&times;</span>
            <h2>Seu Carrinho</h2>
            <div id="cartItems"></div>
            <div class="cart-total" id="cartTotal">Total: R$ 0,00</div>
            <button class="checkout-btn" onclick="checkout()">Finalizar Compra</button>
        </div>
    </div>


    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contato</h3>
                <p>📧 contato@praiadaspulseiras.com</p>
                <p>📱 (11) 99999-9999</p>
                <p>📍 Praia de Copacabana, RJ</p>
            </div>
            <div class="footer-section">
                <h3>Sobre Nós</h3>
                <p>Somos uma empresa dedicada à criação de pulseiras artesanais únicas, inspiradas na beleza natural das praias brasileiras.</p>
            </div>
            <div class="footer-section">
                <h3>Redes Sociais</h3>
                <a href="#" target="_blank">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">WhatsApp</a>
            </div>
        </div>
        <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #555;">
            <p>&copy; 2025 Praia das Pulseiras. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Notification -->
    <div class="notification" id="notification"></div>

    <!-- Script -->
    <script src="/public/script.js"></script>
</body>

</html>