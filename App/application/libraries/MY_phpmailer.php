<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_PHPMailer {
    public function MY_PHPMailer() {
        //require_once('PHPMailer/class.phpmailer.php');
        require 'PHPMailer/PHPMailerAutoload.php';
    }

    //--------------------

    public function send($to,$subject,$body,$altbody,$cc,$from_info){
      require 'PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;

      $from = "noreply.info@euro-mega.com";
      $password = "Eurobi16";

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'mail.euro-mega.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $from;                 // SMTP username
      $mail->Password = $password;                           // SMTP password
      //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;
      $mail->setFrom($from, $from_info);
      $mail->addAddress($to, $to);     // Add a recipient
      $mail->addCC($cc);
      $mail->isHTML(true);

      $mail->Subject = $subject;
      $mail->Body    = $body;
      //$mail->AltBody = $altbody;
      //$mail->attach  = $attachment;
      //$mail->addAttachment($attachment);

      if(!$mail->send()) {
          //echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          //echo 'Message has been sent';
      }
    }

    function email_from_website($header,$name,$phone,$email,$msg){
      $base_url = base_url();
      $htmlContent = '<html><body>';

        $htmlContent.="<body style='-moz-box-sizing: border-box; -ms-text-size-adjust: 100%; -webkit-box-sizing: border-box; -webkit-text-size-adjust: 100%; Margin: 0; border: 0; box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: normal; height: 100%; line-height: 24px; margin: 0; min-width: 100%; outline: 0; padding: 0; width: 100%;'>

                                            <table class='alert alert-success' style='border: 0; border-collapse: separate !important; border-spacing: 0px; font-family: Helvetica, Arial, sans-serif; margin-bottom: 16px; mso-table-lspace: 0pt; mso-table-rspace: 0pt;' border='0' cellpadding='0' cellspacing='0'
                                              width='100%'>
                                              <tbody>
                                                <tr>
                                                  <td colspan='2' style='width:150px; border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <h4>".$header."</h4>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td style='width:150px; border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>Name</div>
                                                  </td>
                                                  <td style='border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>".$name."</div>
                                                  </td>
                                               </tr>
                                               <tr>
                                                 <td style='width:150px; border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>Phone Number</div>
                                                 </td>
                                                 <td style='border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>".$phone."</div>
                                                 </td>
                                               </tr>
                                               <tr>
                                                  <td style='width:150px; border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>Email Address</div>
                                                  </td>
                                                  <td style='border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>".$email."</div>
                                                  </td>
                                               </tr>
                                               <tr>
                                                  <td style='width:150px; border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>Message</div>
                                                  </td>
                                                  <td style='border: 1px solid transparent; border-collapse: collapse; border-color: #9be7ac; border-radius: 4px; border-spacing: 0px; color: #0a2c12; font-size: 16px; line-height: 24px; margin: 0; padding: 12px 20px;' bgcolor='#afecbd'>
                                                    <div>".$msg."</div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>";
            $htmlContent.= '</body></html>';
        return $htmlContent;

    }

}

?>