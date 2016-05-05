<?php
$to = "contato@terrasdamantiqueira.com";
$subject= "TESTE ANUNCIO";
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$cmname = $_POST['cmname'];
$add = $_POST['add'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$comments = $_POST['comments'];

$to = "contato@terrasdamantiqueira.com";
$subject= "TESTE ANUNCIO";
$todayis = date("l, F j, Y, g:i a") ;


$subject= "Request For Quote from WWW.JEEVANMUKTI.INF0";
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$cmname = $_POST['cmname'];
$add = $_POST['add'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$comments = $_POST['comments'];
$message = "
Date ------- $todayis
Name ------ $name
Last Name ------- $lastname
Email ----------- $email
Company --------- $cmname
Address --------- $add
City ------------ $city
State ----------- $state
Zip ------------- $zip
Phone ----------- $phone
Fax ------------- $fax
Message --------- $comments
";
  $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
         $headers = "From: $email\r\n" .
         "MIME-Version: 1.0\r\n" .
            "Content-Type: multipart/mixed;\r\n" .
            " boundary=\"{$mime_boundary}\"";
         $message = "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" .
         $message . "\n\n";
         foreach($_FILES as $userfile)
         {
            $tmp_name = $userfile['tmp_name'];
            $type = $userfile['type'];
            $name = $userfile['name'];
            $size = $userfile['size'];
            if (file_exists($tmp_name))
            {
               if(is_uploaded_file($tmp_name))
               {
                  $file = fopen($tmp_name,'rb');
                  $data = fread($file,filesize($tmp_name));
                  fclose($file);
                  $data = chunk_split(base64_encode($data));
               }
               $message .= "--{$mime_boundary}\n" .
                  "Content-Type: {$type};\n" .
                  " name=\"{$name}\"\n" .
                  "Content-Disposition: attachment;\n" .
                  " filename=\"{$fileatt_name}\"\n" .
                  "Content-Transfer-Encoding: base64\n\n" .
               $data . "\n\n";
            }
         }
         $message.="--{$mime_boundary}--\n";
if (mail($to, $subject, $message, $headers))
   echo "Mail sent successfully.";
else
   echo "Error in mail";
?>