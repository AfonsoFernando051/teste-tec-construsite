<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carregue a biblioteca PHPMailer

$config = include './config.php';

$email = $config['email'];
$senha = $config['senha'];
$name = $config['name'];

if(isset($_POST["btnSend"])){
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor de email
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email;
        $mail->Password = $senha;
        $mail->SMTPSecure = 'tsl';
        $mail->Port = 587;
        $mail->AuthType = 'PLAIN';
        $mail->CharSet = 'UTF-8';

        // Configurações do email
        $mail->setFrom($email, $name);
        $mail->addAddress($_POST['email'], $_POST['nome']);
        $mail->addReplyTo($_POST['email'], $_POST['nome']);
        $mail->Body = $_POST['mensagem'];
        
        // Adicione os campos do formulário ao corpo do email
        $mail->Body .= "\n\nNome: " . $_POST['nome'];
        $mail->Body .= "\nTelefone: " . $_POST['telefone'];
        $mail->Body .= "\nEmail: " . $_POST['email'];
        $mail->Body .= "\nMensagem: " . $_POST['mensagem'];
    
        // Tenta enviar o email
        $mail->send();
        echo "
            <script>
                alert('Mensagem enviada com sucesso!');
                document.location.href = 'index.php'
            </script>
        ";
        
    } catch (Exception $e) {
        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
    }
}
?>
