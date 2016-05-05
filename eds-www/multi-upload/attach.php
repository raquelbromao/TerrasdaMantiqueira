<?php

require("phpmailer/class.phpmailer.php");

//variáveis
$name = "Raquel";
$email_subject = "E-mail com imagens anexadas";
$Email_msg = "TESTE: \n";
$Email_to = "raquelbromao@gmail.com"; // the one that recieves the email
$email_from = "raquelromao@hotmail.com";
$dir = "uploads/$filename";
chmod("uploads", 0777);
$attachments = array();

//check formato
checkType();
function checkType() {
  while(list($key,$value) = each($_FILES[images][type])) {
    strtolower($value);
    if($value != "image/jpeg" AND $value != "image/png" AND $value != "") {
      exit('Desculpe, formato dos arquivos é '.($value).' , é aceito somente imagens tipo JPEG e PNG.');
    }
  }
  checkSize();
}

//check tamanho
function checkSize() {
  while(list($key,$value) = each($_FILES[images][size])) {
    $maxSize = 5000000;
    if(!empty($value)) {
      if ($value > $maxSize) {
        echo "Deculpe o tamanhos do(s) arquivo(s) é muito grande... o tamanho máximo suportado é 5MB";
        exit();
      }
      else {
        $result = "Tamanho do(s) arquivo(s) OK";
      }
    }
  }
  uploadFile();
}

//função de upload
function uploadFile() {
  global $attachments;
  while(list($key, $value) = each($_FILES[images][name])) {
    if(!empty($value)) {
      $filename = $value;
      //vetor de arquivos - array_push($attachments, $filename);
      $dir = "uploads/$filename";
      chmod("uploads", 0777);
      $success = copy($_FILES[images][tmp_name][$key], $dir);
    }
  }
  if ($success) {
    echo "Seus arquivos foram enviados (upload) com sucesso para o servidor e serão anexados";
    SendIt();
  }
  else {
    exit("Desculpe o servidor não conseguiu receber o upload dos arquivos");
  }
}

//PHPMailer com anexos
function SendIt() {
  //variáveis
  global $attachments, $name, $Email_to, $Email_msg, $email_subject, $email_from;

  $Email = new PHPMailer();
  $Email->IsSMTP(); //via SMTP
  $Email->Host = "localhost"; //SMTP servers
  $Email->SMTPAuth = false; //autenticação SMTP
  $Email->From = $email_from;
  $Email->FromName = $name;
  $Email->AddAddress($Email_to);
  $Email->AddReplyTo($email_from);
  $Email->WordWrap = 50; //tamanho da msg

  //anexando todos os arquivos para envio
  foreach($attachments as $key => $value) {
    $Email->AddAttachment("uploads"."/".$value);
  }

  $Email->Body = $Email_msg. "Nome : " .$name."\n";
  $Email->IsHTML(false); //envio como HTML (falso)
  $Email->Subject = $email_subject;

  if(!$Email->Send()) {
    echo "Esse e-mail não pode ser enviado";
    echo "Erro: " . $mail->ErrorInfo;
    exit;
  }
  
  echo "Seu e-mail foi enviado, aguarde nosso contato";

  //apagar uploads
  foreach($attachments as $key => $value) {
    unlink("uploads"."/".$value);
   }
}

?>
