<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body>
    <!-- Products Section -->
    <section class="products" id="products">
        <h2 class="section-title">Nossos Produtos</h2>

        <div class="product-filters">
            <button class="filter-btn active" data-filter="all">Todos</button>
            <button class="filter-btn" data-filter="macrame">Pulseiras</button>
            <button class="filter-btn" data-filter="beads">Colares</button>
        </div>

        <div class="product-grid" id="productGrid">
            <?php foreach ($produtos as $produto): ?>
                <div class="product-card">
                    <img src="<?= htmlspecialchars($produto['imagem'] ?? 'imagens/padrao.jpg') ?>" alt="foto">
                    <div class="product-info">
                        <h3 class="product-name"><?= htmlspecialchars($produto['nome']) ?></h3>
                        <p class="product-price">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        <p class="product-description"><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
                        <button class="add-to-cart" onclick="addToCart(<?php $produto['id'] ?>)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
    </section>
</body>

</html>