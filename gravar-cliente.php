<?php 

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];

    include_once 'conexao.php';

    mysqli_autocommit($con, FALSE);

    $sql = "insert into cliente values(null,'".$nome."','".$email."')";

    if(mysqli_query($con,$sql)){
        //gravou cliente
        $idcliente = mysqli_insert_id($con);
        $sql2 = "insert into endereco values(null,'".$logradouro."','".$numero."',
        '".$complemento."','".$cep."','".$bairro."','".$cidade."','".$uf."',".$idcliente.")";

        //gravou endereço
        if(mysqli_query($con,$sql2)){
            echo "Gravado com sucesso!";
            mysqli_commit($con); //confirma a transação 

            


        }else{
            echo "Erro ao gravar endereço";
            mysqli_rollback($con); //desfaz a transação até o último commit
        }


    }else{
        echo "Erro ao gravar cliente!";
    }

    mysqli_close($con);

?>