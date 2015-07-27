<!-- *********************************************************************** -->
<!--                                                                         -->
<!--                                                      :::      ::::::::  -->
<!-- contact.php                                        :+:      :+:    :+:  -->
<!--                                                  +:+ +:+         +:+    -->
<!-- By: mbouallo <mbouallo@student.42.fr>          +#+  +:+       +#+       -->
<!--                                              +#+#+#+#+#+   +#+          -->
<!-- Created: 2015/07/01 23:51:24 by mbouallo          #+#    #+#            -->
<!-- Updated: 2015/07/01 23:51:26 by mbouallo         ###   ########.fr      -->
<!--                                                                         -->
<!-- *********************************************************************** -->

<?php
if($_POST)
{
    include 'class.phpmailer.php';
    include 'class.smtp.php';
        
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $send_mail = false;
        echo json_encode($send_mail);
        exit;//exit script outputting json data
    }
    else {
        function nettoyerChaine($chaine)
        {
            $caracteres = array(
                'À' => '&Agrave;', 'Á' => '&Acute;', 'Â' => '&Acirc;', 'Ä' => '&Auml;', 'à' => '&agrave;', 'á' => '&aacute;', 'â' => '&acirc;', 'ä' => '&auml;', 
                'È' => '&Egrave;', 'É' => '&Ecute;', 'Ê' => '&Ecirc;', 'Ë' => '&Euml;', 'è' => '&egrave;', 'é' => '&eacute;', 'ê' => '&ecirc;', 'ë' => '&euml;', 
                'Ì' => '&Igrave;', 'Í' => '&Icute;', 'Î' => '&Icirc;', 'Ï' => '&Iuml;', 'ì' => '&igrave;', 'í' => '&iacute;', 'î' => '&icirc;', 'ï' => '&iuml;',
                'Ò' => '&Ograve;', 'Ó' => '&Ocute;', 'Ô' => '&Ocirc;', 'Ö' => '&Ouml;', 'ò' => '&ograve;', 'ó' => '&oacute;', 'ô' => '&ocirc;', 'ö' => '&ouml;',
                'Ù' => '&Ugrave;', 'Ú' => '&Ucute;', 'Û' => '&Ucirc;', 'Ü' => '&Uuml;', 'ù' => '&ugrave;', 'ú' => '&uacute;', 'û' => '&ucirc;', 'ü' => '&uuml;', 
                );

            $chaine = strtr($chaine, $caracteres);
            return $chaine;
        }
        $name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $message   = nettoyerChaine(filter_var($_POST["specialite"], FILTER_SANITIZE_STRING));
        
        $message_body  = "<u><h3>Nom : </h3></u>{$name}<br />";
        $message_body .= "<u><h3>Email : </h3></u>{$email}<br />";
        $message_body .= "<u><h3>Message</h3></u><p><i>{$message}</i></p>";
        
        $mail = new PHPMailer;

        $mail->isSMTP();                                                        // Set mailer to use SMTP
        $mail->SMTPDebug  = 3; 
        $mail->SMTPAuth   = true;                                               // Enable SMTP authentication
        $mail->Host       = 'mx1.hostinger.fr';                                 // SMTP host
        $mail->Port       = 587 ;                                               // SMTP open port
        $mail->Username   = 'contact@marwein.info';                             // SMTP username
        $mail->Password   = 'Nael2014';                                         // SMTP password
        $mail->SMTPSecure = 'tls';                                              // TCP port to connect to

        $mail->From = "contact@marwein.info";
        $mail->FromName = "{$name}";
        $mail->addAddress('contact@marwein.info', "{$name}");         // Add a recipient
        $mail->addReplyTo("$email", "$name");
        $mail->isHTML(true);                                                   // Set email format to HTML

        $mail->Subject = "[marwein.info] Message de $name";
        $mail->Body    = $message_body;
        $mail->AltBody = $message_body;

        $send_mail = $mail->send();
        echo json_encode($send_mail);
        exit;
    }
}
?>
