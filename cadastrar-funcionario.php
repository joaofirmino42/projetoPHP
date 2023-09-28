<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>

        label.error, #respostacpf{
            color:red !important;
            font-size: 12px;
        }

    </style>

</head>
<body>
    
    <div class="container">
        
        <h3>Cadastro de Funcionário</h3>

        <div class="row">
            <div class="col l3 s12">
                <?php include 'sidebar.php'; ?> 
            </div>

            <div class="col l9 s12">
                
                <form enctype="multipart/form-data" action="gravar-funcionario.php" method="post" id="fcadastro" autocomplete="off">

                    <input type="text" name="nome" placeholder="Nome" class="required" minlength="3">
                    <input type="text" name="email" placeholder="E-mail" class="required email">
                    <input type="text" name="dtnasc" placeholder="Data de Nascimento" class="required dateBR" id="dtnasc">
                    <input type="text" name="cpf" placeholder="Cpf" class="required" id="cpf">

                    
                    Foto: <input type="file" name="foto" accept=".jpg,.png,.gif">

                    <span id="respostacpf"></span>

                    <select name="cargo" required>
                        <option value="" disabled selected>Escolha</option>

                        <?php
                            include_once 'conexao.php';

                            $sql = "select idcargo,nomecargo from cargo order by nomecargo";

                            $result = mysqli_query($con,$sql);

                            while($row = mysqli_fetch_array($result)){
                             ?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                             <?php
                            }   

                            mysqli_close($con);
                        ?>

                    </select>

                    <button class="btn" id="btnCad">Cadastrar</button>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/maskedinput-1.4.1.js"></script>


    <script>
        $(document).ready(function(){
            $('select').formSelect();
            $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});

            $('#fcadastro').validate();

            $('#dtnasc').mask("99/99/9999");
            $('#cpf').mask("999.999.999-99");


            $("#cpf").keyup(function(){
                
                var cpfDigitado = $(this).val(); //this -> #cpf                
                cpfDigitado = cpfDigitado.split("_").join("");
                                      
                if(cpfDigitado.length==14){

                    $.post("consultar-cpf.php",
                        {cpf:cpfDigitado},
                        function(resposta){
                            
                            //console.log(resposta);                        
                            if(resposta == "erro"){
                                $("#respostacpf").html("Cpf já cadastrado!");
                                $("#btnCad").addClass("disabled");
                            }else{
                                $("#respostacpf").html("");
                                $("#btnCad").removeClass("disabled");
                            }

                        });

                }

            });
            

         });
    </script>


</body>
</html>