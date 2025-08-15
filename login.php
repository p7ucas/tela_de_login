<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
        }
        .login-box {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 login-box">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4">
                            <h1 class="fw-bold mb-2 text-uppercase">Login</h1>
                            <p class="text-white-50 mb-5">Por favor, insira seu CPF e senha!</p>
                            <form action="_testLogin.php" method="POST">
                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="cpf" placeholder="CPF" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="senha" placeholder="Senha" class="form-control form-control-lg" />
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Entrar</button>
                            </form>
                        </div>
                        <div>
                            <p class="mb-0">Não tem uma conta? <a href="formulario.php" class="text-white-50 fw-bold">Cadastre-se</a></p>
                            <a href="home.php" class="text-white-50">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
