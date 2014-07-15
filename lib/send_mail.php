<?php

/**
 * Send Mail File
 * 
 * 
 * @author Hardik Shah <hardik@hciteam.com>
 * @version 1.0
 * @package makeanofferapp
 * @since July 31, 2013
 *
 * 
 */
require_once(_PATH . 'lib/mail/PhpMailer/class.phpmailer.php');
if ($mail_type == 'forgot_password') {
    $mail = new PHPMailer(); // defaults to using php "mail()" 
    $mail->IsSendmail(); // telling the class to use SendMail transport
    $body = '<html>
                         <head><title>New Password</title></head>
                         <body>
                            <table>
                                <tr>
                                    <td>Hi ' . $customer_name . ',</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Your new Password : </td>
                                    <td>' . $new_password . '</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Thanks,</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Make An Offer Team</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                         </body>
                     </html>';

    $mail->SetFrom('info@makeanoffer.com', 'Make An Offer');
    $mail->AddReplyTo('brent@hciteam.com', 'Brent');
    $mail->AddAddress(trim($_REQUEST['user_email']), $customer_name);
    $mail->AddBCC('brent@hciteam.com', 'Brent');

    $mail->Subject = "New Password of Make An Offer";

    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    $mail->MsgHTML($body);

    if (!$mail->Send()) {
        $file = fopen("forgot_password.html", "w");
        $content = '';
        $content.=$mail->Subject . "<br/>";
        $content.=$body;
        echo fwrite($file, $content);
        fclose($file);
        $mail_error = 1;
        $mail_error_detail = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $mail_error = 0;
    }
} elseif ($mail_type == 'signup') {
    
    
    
    $mail = new PHPMailer(); // defaults to using php "mail()" 
    $mail->IsSendmail(); // telling the class to use SendMail transport
    $body = '<html>
                         <head><title>New Registration</title></head>
                         <body>
                            <table>
                                <tr>
                                    <td>Hi ' . $customer_name . ',</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Welcome to Make an Offer Application<br/>
                                        Congratulations on your acceptance into the Make an Offer!The time has come to<br/>
                                        convert your Lookers into Buyers!Import your store products, use or create beautiful<br/>
                                        button, and to store and see ho fast things will happen.
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        Your Login Name : ' . $customer_email . '<br/>
                                        Your Password   : ' . $customer_password . '<br/>
                                        Forgot Password : <a href="http://makeanofferapp.com/mao_alpha/forgot_password">Click Here</a><br/>
                                        You can login to your account at : <a href="http://makeanofferapp.com/mao_alpha/">http://makeanofferapp.com/mao_alpha/</a>
                                   </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        Follow 4 simple steps and you are ready to go:<br/>
                                        Step 1 - Provide Server Information<br/>
                                        Step 2 - Import Products<br/>
                                        Step 3 - Configure Products<br/>
                                        Step 4 - Customize and Go!<br/>
                                        Should you ever encounter problems with your account or forgot your password we will contact you at this address.
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Enjoy!</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>The HCi Team</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                         </body>
                     </html>'; 
//    $body = file_get_contents(_PATH.'lib/mail/sign_up_mail.html');
//    $body = str_replace('[USER_EMAIL]',$customer_email,$body);
//    $body = str_replace('[PASSWORD]',$customer_password,$body);
    $mail->SetFrom('info@makeanoffer.com', 'Make An Offer');
    $mail->AddReplyTo('brent@hciteam.com', 'Brent');
    $mail->AddAddress($customer_email, $customer_name);
    $mail->AddBCC('brent@hciteam.com', 'Brent');
    $mail->AddBCC('hardik@hciteam.com', 'Hardik');
    

    $mail->Subject = "Congratulations, Your Make An Offer Registration Completed!!";

    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    $mail->MsgHTML($body);

    
    $response = $mail->Send();
    
    if (!$response) {
        $time = time();
        $file = fopen(_PATH . "lib/mail/fails/sign_up_mail_{$time}.html", "w");
        $content = '';
        //$content.=$mail->Subject . "<br/>";
        $content.=$body;
        echo fwrite($file, $content);
        fclose($file);
        $mail_error = 1;
        $mail_error_detail = "Mailer Error: " . $mail->ErrorInfo;
    } else {
        $mail_error = 0;
    }
}
?>