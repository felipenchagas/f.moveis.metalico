<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("novo/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
	
	
     $mail->Host = 'mail.fabrica47.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'comercial@fabrica47.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'Josiane8080'; // Senha do servidor SMTP (senha do email usado)

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('comercial@fabrica47.com.br', 'Site'); //Seu e-mail
     $mail->AddReplyTo('comercial@fabrica47.com.br', 'Nome'); //Seu e-mail
	
     $mail->Subject = 'ORÇAMENTO - SITE - FABRICA47';//Assunto do e-mail
	 
	 
	 $nomeremetente = $_POST['nomeremetente'];
	 $emailremetente = $_POST['emailremetente'];
	 	 $assunto = $_POST['assunto'];
	 $ddd = $_POST['ddd'];
   $telefone = $_POST['telefone'];
   $mensagem = $_POST['mensagem'];
   
   
    
	
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('comercial@fabrica47.com.br', 'Fabrica 47');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email

     $mail->MsgHTML("Mensagem do Cliente: <br /><br />
	 $nomeremetente <br /><br />
	 $emailremetente <br /><br />
      $ddd $telefone <br /><br />
	  $assunto <br /><br />
	 $mensagem "); 

 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
	 
     header("Location: sucesso.html");
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>