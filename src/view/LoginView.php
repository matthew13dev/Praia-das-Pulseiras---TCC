<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="/public/style.css">
</head>

<body>
    <a href="/index.php">Acessar Loja</a>
    <form action="/src//controller/LoginController.php" method="post">
        <h1>Entrar em Conta</h1>

        <label for=""></label>
        <input type="text" placeholder="Email" id="email">

        <label for="senha"></label>
        <input type="password" placeholder="Senha" id="senha">

        <p>Não tem uma conta? Crie uma <a href="./SingupView.php">aqui</a>!</p>

        <button name="btnLogin" class="btnEntrar">Entrar</button>
    </form>
</body>

</html>