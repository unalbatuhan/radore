<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'class.phpmailer.php';
include 'class.smtp.php';
$mail = new PHPMailer();
$mail->IsSMTP(true);
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';
$mail->WordWrap = 50;
$mail->IsHTML(true);

$smtpuser = "isminiz@alanadiniz.com";
$smtphost = "mail.alanadiniz.com";
$smtpport = "587";
$smtppass = "mailsifreniz";

if (isset($_POST["mail_gonder"])) {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $comment = htmlspecialchars($_POST["comment"]);


    $epostal = $smtpuser;
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $smtphost;
    $mail->Port = $smtpport;
    $mail->SMTPSecure = 'tls';
    $mail->Username = $smtpuser;
    $mail->Password = $smtppass;
    $mail->SetFrom($mail->Username, $name);
    $mail->AddAddress($smtpuser, $name);
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;

    $mail->CharSet = 'UTF-8';
    $mail->Subject = "Konu Başlığı";
    $content = '
	<b>Websitenizden gelen iletişim maili</b><br>
	<table align="left" class="tg" style="undefined;table-layout: fixed; width: 535px">

		<tr>
			<td class="tg-031e">Ad Soyad: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $name . '</td>
		</tr>
		<tr>
			<td class="tg-031e">Eposta: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $email . '</td>
		</tr>
		<tr>
			<td class="tg-031e">Mesaj: </td>
			<td class="tg-031e">:</td>
			<td class="tg-031e">' . $comment . '</td>
		</tr>
	</table>';


    $mail->MsgHTML($content);
    if ($mail->Send()) {
        echo "<script type='text/javascript'>alert('Mesajınız başarıyla gönderildi!');</script>";

    } else {
        echo "mail gonderilmedi";
    }

}


exit;

?>

