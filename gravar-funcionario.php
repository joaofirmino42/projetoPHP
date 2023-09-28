<?php 

    include_once 'funcoes.php';
    include_once 'conexao.php';

       
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dtnasc = dataBanco($_POST["dtnasc"]);
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"]; //idcargo


    if(empty($_FILES["foto"]["name"])){
        $foto = "foto.jpg";        
        $file = false;
    }else{
        $arquivo = $_FILES["foto"];

        //marcos.santos.jpg
        $ext = explode(".",$arquivo["name"]); //[marcos][santos][jpg]
        $ext = array_reverse($ext); //[jpg][santos][marcos]
        $ext = $ext[0]; //ext

        $foto = $nome.time().".".$ext; //gerando um nome para o arquivo
        $file = true;
    }

    //var_dump($foto);

    
    $sql = "insert into funcionario values(null,'".$nome."','".$email."','".$dtnasc."','".$cpf."','".$foto."',".$cargo.")";

    if(mysqli_query($con,$sql)){
        $msg = "Gravado com sucesso!";
        
        if($file){
            move_uploaded_file($arquivo["tmp_name"],'img/'.$arquivo["name"]);
        }

    }else{
        $msg = "Erro ao gravar!";
    }

    mysqli_close($con);

?>

<script>
    alert('<?php echo $msg;?>');
    location.href="painel.php";
</script>


