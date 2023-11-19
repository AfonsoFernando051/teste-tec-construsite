<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carregue a biblioteca PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Configurações do servidor de email
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'seu_email@example.com';
$mail->Password = 'sua_senha';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Configurações do email
$mail->setFrom('seu_email@example.com', 'Seu Nome');
$mail->addAddress('destinatario@example.com', 'Nome do Destinatário');
$mail->Subject = 'Assunto do Email';
$mail->Body = 'Conteúdo do Email';

// Adicione os campos do formulário ao corpo do email
$mail->Body .= "\n\nNome: " . $_POST['nome'];
$mail->Body .= "\nTelefone: " . $_POST['telefone'];
$mail->Body .= "\nEmail: " . $_POST['email'];
$mail->Body .= "\nMensagem: " . $_POST['mensagem'];

try {
    // Tenta enviar o email
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>
