# teste-tec-construsite

Teste técnico da empresa construsite.

O teste consiste em criar uma página de acordo com um design específico e logo em seguida criar um formulário para envio de email, usando a Lyb PHPMailer.

Neste projeto usei: PHP 8.1, Composer, PHPMailer, Jquery e Bootstrap.

OBS => Para utilizar corretamente, é necessária a criação de um arquivo chamado config.php com a seguinte estrutura:

<?php
    return [
        'name' => 'nome',
        'email' => 'seuemail@gmail.com',
        'senha' => 'senha',
    ];

Este arquivo será importado na classe ClassSendMessage e é essencial para o funcionamento, tendo em conta que é onde contém os dados para autenticação e envio de email.