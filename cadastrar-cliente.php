<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
    
    <div class="container">
        
        <h3>Cadastro de Cliente</h3>

        <div class="row">
            <div class="col l3 s12">
                <?php include 'sidebar.php'; ?> 
            </div>

            <div class="col l9 s12">
                
                <form action="gravar-cliente.php" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col l6 s12">
                            <input type="text" name="nome" required placeholder="Nome do Cliente">
                        </div>
                        <div class="col l6 s12">
                            <input type="email" name="email" required placeholder="E-mail">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <input type="text" name="cep" id="cep" required placeholder="Digite o Cep" maxlength="8">
                        </div>

                        <div class="col s12 l6">
                            <input type="text" name="logradouro" id="logradouro" required placeholder="Logradouro">
                        </div>

                        <div class="col s12 l2">
                            <input type="text" name="numero" id="numero" placeholder="Número">
                        </div>
                        <div class="col s12 l4">
                            <input type="text" name="complemento" placeholder="Complemento">
                        </div>


                        <div class="col s12 l5">
                            <input type="text" name="bairro" id="bairro" required placeholder="Bairro">
                        </div>
                        <div class="col s12 l5">
                            <input type="text" name="cidade" id="cidade" required placeholder="cidade">
                        </div>
                        <div class="col s12 l2">
                            <input type="text" name="uf" id="uf" required placeholder="UF">
                        </div>

                        <div class="col">
                            <button class="btn">Cadastrar</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>

       $(document).ready(function(){

            $("#cep").keyup(function(){

                var cepDigitado = $("#cep").val();

                if(cepDigitado.length==8){

                    $.getJSON("https://viacep.com.br/ws/"+cepDigitado+"/json/",
                            function(dados){
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#numero").focus();
                            });

                }else{
                    $("#logradouro").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");                    
                }

            });

        });

    </script>


</body>
</html>