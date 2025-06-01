<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesso - Praia das Pulseiras</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <style>
        body {
            display: grid;
            grid-template-rows: auto 1fr auto;
            /* Header, Conteúdo, Footer */
            min-height: 100vh;
        }

        .success-container {
            max-width: 600px;
            margin: 0 auto;
            /* Remove margin-top e bottom fixos */
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-self: center;
            /* Centraliza verticalmente no grid */
        }

        .success-container h2 {
            color: #4CAF50;
            margin-bottom: 1rem;
        }

        .success-container p {
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .back-home-btn {
            display: inline-block;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .back-home-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <nav>
            <div class="logo">🏖️ Praia das Pulseiras</div>
            <ul class="nav-links">
                <li><a href="PRAIA DAS PULSEIRAS OLD.html#home">Início</a></li>
                <li><a href="PRAIA DAS PULSEIRAS OLD.html#products">Produtos</a></li>
                <li><a href="PRAIA DAS PULSEIRAS OLD.html#about">Sobre</a></li>
                <li><a href="PRAIA DAS PULSEIRAS OLD.html#contact">Contato</a></li>
            </ul>
            <div class="cart-icon">
                🛒
                <span class="cart-count">0</span> <!-- Carrinho estará vazio após a compra -->
            </div>
        </nav>
    </header>

    <div class="success-container">
        <h2>Pagamento Processado!</h2>
        <p>Sua compra foi realizada com sucesso. Agradecemos pela preferência!</p>
        <a href="../index.html" class="back-home-btn">Voltar para a página inicial</a>
    </div>

    <!-- Footer -->
    <footer>
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
        </div>
    </footer>

</body>

</html>