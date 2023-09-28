<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>

        label.error{
            color:red !important;
            font-size: 12px;
            display: block;
        }

    </style>


</head>
<body>
    
    <div class="container">
        
        <h3>Cadastro de Cargo</h3>

        <div class="row">
            <div class="col l3 s12">
                <?php include 'sidebar.php'; ?> 
            </div>

            <div class="col l9 s12">

                <form id="fcargo">
                    <input type="text" class="required" name="nomecargo" id="nomecargo" placeholder="Nome do Cargo">
                    <input type="text" class="required" name="salario" id="salario" placeholder="Salário">

                    <button type="button" class="btn" id="btnCad">Cadastrar</button>
                </form>
                
                <h5 id="msg"></h5>
                
            </div>

        </div>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/jquery.maskMoney.js"></script>
<script src="js/jquery.validate.js"></script>


<script>
    $(document).ready(function(){
        $("#salario").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

        $("#btnCad").click(function(){

            if($("#fcargo").valid()){

                var nomeCargoDigitado = $("#nomecargo").val();
                var salarioDigitado = $("#salario").val();

                $.post("gravar-cargo.php",
                    {nomeCargo:nomeCargoDigitado, salario:salarioDigitado},
                    function(resposta){
                            $("#msg").html(resposta);
                    });

            }

        });

    });
</script>

</body>
</html>