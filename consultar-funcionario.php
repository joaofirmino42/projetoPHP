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
        
        <h3>Consulta de Funcionários</h3>

        <div class="row">
            <div class="col l3 s12">
                <?php include 'sidebar.php'; ?> 
            </div>

            <div class="col l9 s12">
            
                <input type="text" placeholder="Digite para pesquisar" autocomplete="off" id="busca">
                <br><br>
                <div id="conteudo"></div>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>

        $(document).ready(function(){

            //ao soltar uma tecla
            $("#busca").keyup(function(){
                
                var valorDigitado = $("#busca").val();
                
                $.post("buscar-funcionario.php",
                      {valor:valorDigitado},
                      function(resposta){

                        $("#conteudo").html(resposta);

                      });
                //resposta representa tudo que for impresso no buscar-funcionario.php

            });

        });

    </script>

</body>
</html>