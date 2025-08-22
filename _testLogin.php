
<?php
    
    //print_r($_REQUEST);
    if(isset($_POST["submit"]) && !empty($_POST["cpf"]) && !empty($_POST["senha"]))
    {
        include_once('_config.php');
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];

        /*
        print_r("CPF: ". $cpf);
        print_r('<br>');
        print_r("Senha: ". $senha); 
        */

        $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf' and senha = '$senha'";

        $result = $conexao->query( $sql );
        /*
        print_r($sql);
        print_r($result);*/

        if( mysqli_num_rows($result) < 1){
            header('Location: login.php');
        }
        else{
            header('Location: sistema.php');
        }
    }
    else
    {
        header("Location: login.php");
    }
?>