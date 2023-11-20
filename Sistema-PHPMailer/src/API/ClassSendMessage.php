<?php
header('Access-Control-Allow-Origin: http://localhost:8000');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Max-Age: 3600');
header('Content-Type: application/json');

require '../../vendor/autoload.php';
include '../../src/Validator/ClassValidaEmail.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$config = include '../config.php';
$emailLocal = $config['email'];
$passwordLocal = $config['senha'];
$nameLocal = $config['name'];

// Dados do formulário
$nameToSend = $_POST['nome'] ? !empty($_POST['nome']) : "teste-nome" ;
$cellToSend = $_POST['telefone'] ? !empty($_POST['telefone']) : "teste-cell" ;
$emailToSend = $_POST['email'] ? !empty($_POST['email']) : "teste@gmail.com" ;
$messageToSend = $_POST['mensagem'] ? !empty($_POST['mensagem']) : "teste-message" ;

// Validar os campos
if (empty($nameToSend) || empty($cellToSend) || empty($emailToSend) || empty($messageToSend)) {
    echo json_encode(['erro' => true, 'mensagem' => 'Todos os campos são obrigatórios.']);
    exit; // Encerra a execução aqui para evitar problemas adicionais
}

if (!ValidaEmail::ValidacaoDeEmail($emailToSend)) {
    echo json_encode(['erro' => true, 'mensagem' => 'O email inserido não é válido.']);
    exit; // Encerra a execução aqui para evitar problemas adicionais
}

if (isset($_POST["btnSend"])) {
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor de email
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $emailLocal;
        $mail->Password = $passwordLocal;
        $mail->SMTPSecure = 'tsl';
        $mail->Port = 587;
        $mail->AuthType = 'PLAIN';
        $mail->CharSet = 'UTF-8';

        // Configurações do email
        $mail->setFrom($emailLocal, $nameLocal);
        $mail->addAddress($emailToSend, $nameToSend);
        $mail->addReplyTo($emailLocal, $nameToSend);
        $mail->Body = $messageToSend;

        // Adicione os campos do formulário ao corpo do email
        $mail->Body .= "\n\nNome: " . $nameToSend;
        $mail->Body .= "\nTelefone: " . $cellToSend;
        $mail->Body .= "\nEmail: " . $emailToSend;
        $mail->Body .= "\nMensagem: " . $messageToSend;

        // Tenta enviar o email
        $mail->send();
        echo json_encode(['sucesso' => true, 'mensagem' => 'Mensagem enviada com sucesso.']);
    } catch (Exception $e) {
        echo json_encode(['erro' => true, 'mensagem' => "Erro ao enviar mensagem: {$mail->ErrorInfo}"]);
    }
}
?>
