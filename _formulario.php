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

    include_once("_config.php");

    $cpf = $_POST["cpf"];

    if (validaCPF($cpf) == false) {
        echo "CPF inválido!";
    } else {

        $sql_check = "SELECT * FROM usuarios WHERE cpf = '{$cpf}'";
        $result_check = $conexao->query($sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            $_SESSION['error'] = "Este CPF já está cadastrado!";
            header('Location: formulario.php');
            exit();
        } else {

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
            $telefone = $_POST["telefone"];
            $sexo = $_POST["genero"];
            $data_nasc = $_POST["data_nascimento"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
            $endereco = $_POST["endereco"];

            $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,cpf,senha,telefone,sexo,data_nasc,cidade,estado,endereco)
            VALUES('$nome','$email','$cpf','$senha','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

            header('Location: login.php');
            exit();
        }
    }
}
?>