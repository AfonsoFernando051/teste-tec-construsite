<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carregue a biblioteca PHPMailer
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
$config = include './config.php';

$email = $config['email'];
$senha = $config['senha'];

if(isset($_POST["btnSend"])){
    // Configurações do servidor de email
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $senha;
    $mail->AuthType = 'PLAIN';
    $mail->SMTPDebug = 2; // Habilita o modo de depuração

    // Configurações do email
    $mail->setFrom('afonsofernando2001@gmail.com');
    $mail->addAddress($_POST['email'], $_POST['nome']);
    $mail->Body = $_POST['mensagem'];
    
    // Adicione os campos do formulário ao corpo do email
    $mail->Body .= "\n\nNome: " . $_POST['nome'];
    $mail->Body .= "\nTelefone: " . $_POST['telefone'];
    $mail->Body .= "\nEmail: " . $_POST['email'];
    $mail->Body .= "\nMensagem: " . $_POST['mensagem'];
    
    try {
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
