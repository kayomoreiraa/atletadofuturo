<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="controllers/cont_login.php" method="post">
            <label for="email">Email: <input type="email" name="email" id="email" required></label>

            <label for="senha">Senha: <input type="password" name="senha" id="senha" required></label>

            <input type="submit" value="Cadastrar" name="btnSubmit">
        </form>
    </main>
</body>
</html>