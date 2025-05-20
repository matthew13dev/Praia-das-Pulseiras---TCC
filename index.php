<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praia das Pulseiras</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <menu>
                <ul>
                    <li><a href="">Entrar/Cadastrar</a></li>
                    <li><a href="">Carrinho</a></li>
                    <li><a href="">Pedidos</a></li>
                </ul>
            </menu>
        </div>
    </header>
    <section id="Home" class="home">
        <div class="container">
            <h1>Praia das Pulseiras</h1>
            <p>Sua loja virtual de Bijuterias Artesanais</p>
        </div>
    </section>
    <?php

    require __DIR__ . '/src/view/CatalogoView.php';
    ?>
</body>

</html>