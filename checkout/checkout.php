<?php
session_start();

// Se o formulário de pagamento foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
    // Em um cenário real, aqui você processaria o pagamento e salvaria o pedido.
    // Por enquanto, apenas simulamos a conclusão da compra.

    // Limpa o carrinho da sessão
    unset($_SESSION['cart']);

    // Redireciona para a página de sucesso
    header('Location: success.php');
    exit();
}

// Verifica se há dados do carrinho na sessão ou se foram enviados via POST (primeiro acesso)
if (isset($_POST['cart_items'])) {
    $_SESSION['cart'] = array_map('json_decode', $_POST['cart_items']);
} elseif (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Se não houver carrinho, redireciona de volta para a página principal
    header('Location: PRAIA DAS PULSEIRAS OLD.html');
    exit();
}

$cart = $_SESSION['cart'];
$total = array_reduce($cart, function ($sum, $item) {
    return $sum + ($item->preco * $item->quantity);
}, 0);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Praia das Pulseiras</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .checkout-container {
            max-width: 800px;
            margin: 120px auto 4rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .checkout-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }

        .order-summary {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border: 1px solid #eee;
            border-radius: 10px;
        }

        .order-summary h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px dashed #eee;
        }

        .order-total {
            text-align: right;
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 1rem;
            color: #667eea;
        }

        .customer-info form {
            display: grid;
            grid-template-columns: 1fr;
            /* Padrão para uma coluna em telas pequenas */
            gap: 1.5rem;
        }

        /* Ajuste para duas colunas em telas maiores */
        @media (min-width: 768px) {
            .customer-info form {
                grid-template-columns: 1fr 1fr;
                /* Duas colunas */
                column-gap: 2rem;
            }

            /* Ocupar a largura total para campos específicos */
            .customer-info form div:nth-child(1),
            /* Nome Completo */
            .customer-info form div:nth-child(2),
            /* E-mail */
            .customer-info form div:nth-child(4),
            /* Endereço Completo */
            .customer-info form .payment-options,
            /* Opções de Pagamento */
            .customer-info form button[type="submit"] {
                /* Botão Pagar Agora */
                grid-column: span 2;
                /* Ocupa as duas colunas */
            }
        }

        .customer-info label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .customer-info input,
        .customer-info select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .payment-options {
            margin-top: 2rem;
            padding: 1.5rem;
            border: 1px solid #eee;
            border-radius: 10px;
        }

        .payment-options h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }

        .payment-methods-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .payment-method-box {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            /* Para o rádio oculto */
        }

        .payment-method-box:hover {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.3);
        }

        .payment-method-box.selected {
            border-color: #667eea;
            background-color: #e6ecfa;
            /* Um tom mais claro para seleção */
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        .payment-method-box input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
            /* Não interage diretamente */
        }

        .payment-method-box img {
            max-width: 80px;
            height: auto;
            margin-bottom: 0.5rem;
        }

        .payment-method-box p {
            font-weight: bold;
            color: #333;
        }

        .card-details {
            display: none;
            /* Oculto por padrão */
            padding: 1.5rem;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-top: 1rem;
        }

        .card-details .input-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Duas colunas para os campos */
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .card-details .input-group.full-width {
            grid-template-columns: 1fr;
            /* Para campos de largura total */
        }

        .card-details label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .card-details input,
        .card-details select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .checkout-btn-final {
            width: 100%;
            padding: 15px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 2rem;
        }

        .checkout-btn-final:hover {
            background: #5a6fd8;
        }
    </style>
</head>

<body>

    <!-- Header (incluir o mesmo header do index.php para manter o layout) -->
    <header>
        <nav>
            <div class="logo">🏖️ Praia das Pulseiras</div>
            <ul class="nav-links">
                <li><a href="../index.html">Início</a></li>
                <li><a href="../index.html#products">Produtos</a></li>
                <li><a href="../index.html#about">Sobre</a></li>
                <li><a href="../index.html#contact">Contato</a></li>
            </ul>
            <!-- O ícone do carrinho aqui pode ser simplificado já que o checkout é a próxima etapa -->
            <div class="cart-icon">
                🛒
                <span class="cart-count"><?php echo array_reduce($cart, function ($sum, $item) {
                                                return $sum + $item->quantity;
                                            }, 0); ?></span>
            </div>
        </nav>
    </header>

    <div class="checkout-container">
        <h2>Finalizar Compra</h2>

        <div class="order-summary">
            <h3>Resumo do Pedido</h3>
            <?php foreach ($cart as $item): ?>
                <div class="order-item">
                    <span><?php echo htmlspecialchars($item->nome); ?> (Qtd: <?php echo $item->quantity; ?>)</span>
                    <span>R$ <?php echo number_format($item->preco * $item->quantity, 2, ',', '.'); ?></span>
                </div>
            <?php endforeach; ?>
            <div class="order-total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></div>
        </div>

        <div class="customer-info">
            <h3>Dados para Entrega e Contato</h3>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <?php foreach ($cart as $item): ?>
                    <input type="hidden" name="items[]" value="<?php echo htmlspecialchars(json_encode($item)); ?>">
                <?php endforeach; ?>

                <div>
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" required placeholder="Ex: (11) 99999-9999">
                </div>
                <div>
                    <label for="endereco">Endereço Completo:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>
                <div>
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required placeholder="Ex: 00000-000">
                </div>

                <div class="payment-options">
                    <h3>Forma de Pagamento</h3>
                    <div class="payment-methods-grid">
                        <label class="payment-method-box" data-method="pix">
                            <input type="radio" id="pix" name="payment_method" value="pix" required>
                            <img src="https://raw.githubusercontent.com/felipecss/assets/master/pix/logo-pix-icone-50x50.png" alt="PIX Icon">
                            <p>PIX</p>
                        </label>
                        <label class="payment-method-box" data-method="cartao">
                            <input type="radio" id="cartao" name="payment_method" value="cartao" required>
                            <img src="https://i.imgur.com/R3a7C9r.png" alt="Credit Card Icon">
                            <p>Cartão</p>
                        </label>
                        <label class="payment-method-box" data-method="boleto">
                            <input type="radio" id="boleto" name="payment_method" value="boleto" required>
                            <img src="https://i.imgur.com/kS6y1Wl.png" alt="Boleto Icon">
                            <p>Boleto</p>
                        </label>
                    </div>

                    <div class="card-details" id="cardDetailsSection">
                        <h4>Detalhes do Cartão</h4>
                        <div class="input-group full-width">
                            <div>
                                <label for="cardNumber">Número do Cartão *</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX">
                            </div>
                        </div>
                        <div class="input-group full-width">
                            <div>
                                <label for="cardholder">Nome do Titular *</label>
                                <input type="text" id="cardholder" name="cardholder" placeholder="Nome Completo">
                            </div>
                        </div>
                        <div class="input-group">
                            <div>
                                <label for="expiryMonth">Data de Validade *</label>
                                <select id="expiryMonth" name="expiryMonth">
                                    <option value="">Mês</option>
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div>
                                <label for="expiryYear">&nbsp;</label>
                                <select id="expiryYear" name="expiryYear">
                                    <option value="">Ano</option>
                                    <?php for ($i = date('Y'); $i <= date('Y') + 10; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group full-width">
                            <div>
                                <label for="cvc">CVC *</label>
                                <input type="text" id="cvc" name="cvc" placeholder="XXX">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="checkout-btn-final">Pagar Agora</button>
            </form>
        </div>
    </div>

    <!-- Footer (incluir o mesmo footer do index.php para manter o layout) -->
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

    <script>
        // Adiciona JavaScript para mostrar/ocultar os campos do cartão
        document.addEventListener('DOMContentLoaded', function() {
            const paymentMethodBoxes = document.querySelectorAll('.payment-method-box');
            const cardDetailsSection = document.getElementById('cardDetailsSection');
            const cardInputs = cardDetailsSection.querySelectorAll('input, select');

            paymentMethodBoxes.forEach(box => {
                box.addEventListener('click', function() {
                    // Remove a classe 'selected' de todas as caixas
                    paymentMethodBoxes.forEach(b => b.classList.remove('selected'));
                    // Adiciona a classe 'selected' à caixa clicada
                    this.classList.add('selected');
                    // Marca o rádio button correspondente
                    this.querySelector('input[type="radio"]').checked = true;

                    if (this.dataset.method === 'cartao') {
                        cardDetailsSection.style.display = 'block';
                        // Torna os campos de cartão obrigatórios
                        cardInputs.forEach(input => input.required = true);
                    } else {
                        cardDetailsSection.style.display = 'none';
                        // Remove a obrigatoriedade dos campos de cartão
                        cardInputs.forEach(input => input.required = false);
                    }
                });

                // Seleciona a primeira opção por padrão ou a selecionada se houver
                if (box.querySelector('input[type="radio"]').checked) {
                    box.classList.add('selected');
                    if (box.dataset.method === 'cartao') {
                        cardDetailsSection.style.display = 'block';
                        cardInputs.forEach(input => input.required = true);
                    }
                }
            });
        });
    </script>

</body>

</html>