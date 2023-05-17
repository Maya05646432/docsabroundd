<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'files/phpmailer/src/Exception.php';
require 'files/phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'files/phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('duendei@mail.ru');
$mail->addAddress('wsxd.ts@mail.ru');
$mail->Subject = 'Разработка сайта';


if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Contact for communication:</strong> '.$_POST['email'].'</p>';
}

if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Message:</strong> '.$_POST['message'].'</p>';
}
if((mb_strlen($_POST['name']) > 25) or (mb_strlen($_POST['email']) > 50) or (mb_strlen($_POST['message']) > 100) ){
    echo "Ошибка";
 } 

if (!$email->send()) {
    $message = 'Ошибка';
}else {
    $message = 'Данные отправлены!';
}
$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>