<?php 

    $cpf = $_POST["cpf"];

    include_once 'conexao.php';

    $sql = "select cpf from funcionario where cpf = '".$cpf."'";

    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result) == 1){
        echo "erro";
    }

    mysqli_close($con);

?>