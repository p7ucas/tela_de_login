
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Você pode manter ou adaptar seu CSS customizado aqui */
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
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-header text-center border-0 bg-transparent pt-4">
                        <h3 class="fw-bold">Formulário de Clientes</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form action="_formulario.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label">email</label>
                                <input type="email" name="email" placeholder="exemplo@exemplo.com" id="email"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" placeholder="000.000.000-00" id="cpf" class="form-control"
                                    maxlength="14" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sexo:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="feminino"
                                        value="feminino" required>
                                    <label class="form-check-label" for="feminino">Feminino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="masculino"
                                        value="masculino" required>
                                    <label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="data_nascimento" class="form-label"><b>Data de Nascimento:</b></label>
                                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control"
                                    required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" name="estado" id="estado" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" name="endereco" id="endereco" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"
                                    value="Cadastrar">
                            </div>

                            <div class="text-center mt-4">
                                <a href="home.php" class="text-white-50">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const cpfInput = document.getElementById('cpf');

        cpfInput.addEventListener('input', () => {
            let value = cpfInput.value.replace(/\D/g, '');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            cpfInput.value = value;
        });
    </script>
</body>

</html>