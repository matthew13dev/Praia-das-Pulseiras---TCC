<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praia das Pulseiras - E-commerce</title>
    <link rel="stylesheet" href="./public/style.css">
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

    <!-- Products Section -->
    <section class="products" id="products">
        <h2 class="section-title">Nossos Produtos</h2>



        <div class="product-grid" id="productGrid">
            <!-- Products will be loaded here by JavaScript -->
        </div>
    </section>

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
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">WhatsApp</a>
            </div>
        </div>
        <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #555;">
            <p>&copy; 2025 Praia das Pulseiras. Todos os direitos reservados.</p>
            <button class="btn" id="adminLoginBtn" style="margin-top: 1rem;">Login Admin</button>
        </div>
    </footer>

    <!-- Notification -->
    <div class="notification" id="notification"></div>

    <!-- Admin Login Modal -->
    <div class="cart-modal" id="adminLoginModal">
        <div class="cart-content" style="max-width: 400px;">
            <span class="close" onclick="closeAdminLogin()">&times;</span>
            <h2>Login do Admin</h2>
            <form id="adminLoginForm" onsubmit="return adminLogin(event)">
                <div style="margin-bottom: 1rem;">
                    <label for="adminEmail">E-mail</label><br>
                    <input type="email" id="adminEmail" required style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #ccc; margin-top: 5px;">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="adminPassword">Senha</label><br>
                    <input type="password" id="adminPassword" required style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #ccc; margin-top: 5px;">
                </div>
                <button class="btn" type="submit" style="width: 100%;">Entrar</button>
            </form>
        </div>
    </div>

    <!-- Admin Panel (hidden by default) -->
    <div id="adminPanel" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:#f8f9fa; z-index:3000;">
        <div style="width:100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white; display:flex; align-items:center; justify-content:space-between; padding:1rem 2rem;">
            <div style="display:flex; gap:1rem;">
                <button class="btn" id="adminNavProdutos" onclick="showAdminSection('produtos')">Produtos</button>
                <button class="btn" id="adminNavPedidos" onclick="showAdminSection('pedidos')">Pedidos</button>
            </div>
            <button class="btn" style="background:#ff4757;" onclick="adminLogout()">Sair</button>
        </div>
        <div id="adminContent" style="max-width:1200px; margin:2rem auto; background:white; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); min-height:500px; padding:2rem; height:calc(100vh - 100px); overflow-y:auto;">
            <!-- Conteúdo do painel admin será carregado aqui -->
        </div>
    </div>

    <script src="./public/script.js"></script>
</body>

</html>