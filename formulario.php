<?php

function validaCPF($cpf)
{
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    if (strlen($cpf) != 11) {
        return false;
    }

    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}
if (isset($_POST["submit"])) {
    /*
    print_r('Nome: '. $_POST['nome']);
    print_r('<br>');
    print_r('CPF: '. $_POST['cpf']);
    print_r('<br>');
    print_r('Telefone: '. $_POST['telefone']);
    print_r('<br>');
    print_r('Sexo: '. $_POST['genero']);
    print_r('<br>');
    print_r('Data de nascimento: '. $_POST['data_nascimento']);
    print_r('<br>');
    print_r('Cidade: '. $_POST['cidade']);
    print_r('<br>');
    print_r('Estado: '. $_POST['estado']);
    print_r('<br>');
    print_r('Endereço: '. $_POST['endereco']);
    */

    include_once("_config.php");

    $cpf = $_POST["cpf"];

    if (validaCPF($cpf) == false) {
        echo "CPF inválido!";
    } else {

        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        $telefone = $_POST["telefone"];
        $sexo = $_POST["genero"];
        $data_nasc = $_POST["data_nascimento"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $endereco = $_POST["endereco"];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,cpf,senha,telefone,sexo,data_nasc,cidade,estado,endereco)
        VALUES('$nome','$cpf','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");
    }
}


?>

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
                        <form action="formulario.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" required>
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
</body>

</html>