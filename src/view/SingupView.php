<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="/public/style.css">
</head>

<body>
    <a href="/index.php">Acessar Loja</a>
    <form action="/src//controller/LoginController.php" method="post">

        <h1>Cadastrar nova Conta</h1>

        <fieldset>
            <legend>Usuário</legend>
            <label for="nome"></label>
            <input type="text" placeholder="Nome" id="nome">

            <label for="email"></label>
            <input type="text" placeholder="Email" id="email">

            <label for="senha"></label>
            <input type="text" placeholder="Senha" id="senha">

            <label for="repetir_senha"></label>
            <input type="text" placeholder="Repetir senha" id="repetir_senha">
        </fieldset>

        <fieldset>
            <legend>Endereco</legend>

            <label for="repetir_senha"></label>
            <input type="text" placeholder="Endereço">

            <label for="repetir_senha"></label>
            <input type="text" placeholder="Cidade">

            <label for="repetir_senha"></label>
            <input type="text" placeholder="Estado">

            <label for="repetir_senha"></label>
            <input type="text" placeholder="CEP">
        </fieldset>


        <p>Já tem uma conta? Entre <a href="./LoginView.php">aqui!</a></p>

        <button name="bntSingup" class="btnCadastrar">Criar conta</button>



    </form>
</body>

</html>