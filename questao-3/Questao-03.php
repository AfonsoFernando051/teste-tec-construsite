<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Questao-3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handel+Gothic:wght@700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <title>Document</title>
</head>
<body>
    <header class="logo">
        <img src="./assets/logo-construsite-new.png" alt="logo principal" id="construsite-img">
    </header>
    <div id="sections" class="container-fluid">
        <div id="first-section" class="col-sm-6">
            <div id="client-name">
                <h3 class="subtitle-construsite">Nome:</h3>
                <h4>Gabriel Henrique</h4>
            </div>
        </div>
        <div id="second-section" class="col-sm-6">
            <form class="form-horizontal" action="index.php#formulario" method="post" role="form" data-toggle="validator">
                <h3 class="text-left subtitle-construsite">Mensagem</h3>
                <div class="form-group">
                    <label class="col-sm-3">Nome*:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nome" id="nome" value="" placeholder="seu nome" required >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Telefone*:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Email*:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" value="" placeholder="exemplo@dominio.com" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Mensagem*:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea" rows="6" 
                                    id="mensagem" name="mensagem" placeholder="sua mensagem" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class = "btn btn-success btn-block" id="submit" name="btnSend" type="submit" value="Enviar Mensagem">
                        <a name="formulario"></a>
                        <div class="mensagem-alerta"><?php echo $msg ?></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</body>
</html>