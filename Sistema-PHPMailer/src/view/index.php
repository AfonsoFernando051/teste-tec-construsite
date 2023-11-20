<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handel+Gothic:wght@700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <title>Construsite Brasil</title>
</head>
<body>
    <header class="logo">
        <img src="../assets/logo-construsite-new.png" alt="logo principal" id="construsite-img">
    </header>
    <div id="sections" class="container-fluid">
        <div id="first-section" class="col-sm-6">
            <div id="client-name">
                <h3 class="subtitle-construsite">Nome:</h3>
                <h4>Gabriel Henrique</h4>
            </div>
        </div>
        <div id="second-section" class="col-sm-6">
            <form class="form-horizontal" method="post" id="submit" role="form" data-toggle="validator">
                <h3 class="text-left subtitle-construsite construsite-msg-subtitle">Mensagem</h3>
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
                        <textarea class="form-control" rows="6" 
                                    id="mensagem" name="mensagem" placeholder="sua mensagem" required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class = "btn btn-success btn-block" name="btnSend" id="btnSend" type="submit" value="Enviar Mensagem">
                        <a name="formulario"></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#submit').on('submit',  function (e) {
                e.preventDefault();

                var form = $('#submit')[0];

                // Executar as validações do validator
                $(form).validator('validate');

                // Se todos os campos estiverem válidos e enviado o formulário
                if (!$(form).find('.has-error').length) {
                    // Coletar os dados do formulário
                    var formData = {
                        nome: $('#nome').val(),
                        telefone: $('#telefone').val(),
                        email: $('#email').val(),
                        mensagem: $('#mensagem').val()
                    };
                    
                    // Enviar a solicitação ao servidor usando XMLHttpRequest ou fetch API
                    fetch('http://localhost:8000/API/ClassSendMessage.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(formData), // Converte o objeto em uma string JSON
                        mode: 'cors' // Use 'cors' se o servidor permitir requisições cross-origin
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Verificar se há sucesso ou erro
                        if (data.sucesso) {
                            alert(data.mensagem);
                        } else {
                            alert('Erro: ' + data.mensagem); // exibir erros de validação
                        }
                    })
                    .catch(error => {
                        console.log(formData);
                        console.error('Erro na solicitação:', error);
                    });
                }
            });
        });
    </script>
</body>
</html>