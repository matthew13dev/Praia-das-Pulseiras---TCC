<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pedidos</title>
    <link rel="stylesheet" href="/public/style.css">
</head>

<body>
    <aside>
        <menu>
            <ul>
                <li>
                    <form action="/src/controller/AdminController.php" method="post"><button name="btnPainelHome" type="submit">Home</button></form>
                </li>
                <li>
                    <form action="/src/controller/AdminController.php" method="post"><button name="btnPainelProdutos">Produtos</button></form>
                </li>
                <li>
                    <form action="/src/controller/AdminController.php" method="post"><button name="btnPainelPedidos">Pedidos</button></form>
                </li>
            </ul>
        </menu>
    </aside>
    <section id="AdminPedido" class="painel">
        <h1>Painel de Gerenciamento do Administrador</h1>
        <h1>Gestão de Pedidos</h1>
    </section>
</body>

</html>