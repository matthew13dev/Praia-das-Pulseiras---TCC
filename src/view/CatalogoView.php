<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos Produtos</title>
    <link rel="stylesheet" href="/css/catalogo.css">
</head>

<body>
    <section id="Catalogo">
        <div class="container">
            <h1>Nossos Produtos</h1>

            <div class="gridProduto">
                <?php foreach ($produtos as $produto): ?>
                    <div class="cardProduto">
                        <img src="<?= htmlspecialchars($produto['imagem'] ?? 'imagens/padrao.jpg') ?>" alt="foto">
                        <h4><?= htmlspecialchars($produto['nome']) ?></h4>
                        <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        <p><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
                        <button name="btnAdicionarCarrinho">adicionar ao carrinho</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

</html>