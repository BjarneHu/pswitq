<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMaiuse PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
//require './vendor/autoload.php';
//require 'PHPMailerAutoload.php';

function get_content_for_customer($data){
  return sprintf("Sehr geehrte/r Herr/Frau %s <br><br> vielen Dank f&Uuml;r Ihre Bestellung. Wir werden Sie benachrichtigen, sobald Ihr(e) Artikel versandt wurde(n)<br>
      Ihre Bestellung:<br> 
      Products:
      <table border='1' cellspacing='5'>
        <tr>
          <td> Model Name </td>
          <td> Material </td>
          <td> Nachbearbeitung </td>
          <td> Anzahl </td>
          <td> Einheitspreis </td>
          <td> Total Preis </td>
        </tr>
        %s
      </table>
      <br><br>

      Gesamtpreis: %s  euro <br><br>
      Lieferadresse: &nbsp; %s , &nbsp; %s, &nbsp; %s <br><br>
      Telefonnummer: %s <br><br>
      Unternehmen: %s <br><br>
      Anmerkungen: %s <br><br>
      <br><br>
      Mit freundlichen Gruessen <br> TQ",
      htmlspecialchars($data['customer']['name']),
      implode('', array_map(
        function($item){
          return sprintf("<tr>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s &euro;</td>
          <td> %s &euro;</td>
        </tr>",
        $item['file_name'],
        $item['material_name'],
        $item['post_process_name'],
        $item['menge'],
        number_format($item['preis'], 2, '.', ''),
        number_format($item['menge'] *  $item['preis'], 2, '.', ''),
      );
      }, 
      $data['warencorb'])),
      number_format($data['total_price'], 2, '.', ''),
    $data['customer']['address'], $data["customer"]["zip"], $data["customer"]["city"],
    $data["customer"]["tel"],
    $data["customer"]["unternehmen"],
    $data["customer"]["note"]
  );
}

function get_content_for_tq($data){
  return sprintf("Soeben wurde eine Bestellung abgegeben <br>
      Bestellung:<br> 
      Products:
      <table border='1' cellspacing='5'>
        <tr>
          <td> Model Name </td>
          <td> Material </td>
          <td> Nachbearbeitung </td>
          <td> Anzahl </td>
          <td> Einheitspreis </td>
          <td> Total Preis </td>
        </tr>
        %s
      </table>
      <br><br>
      Gesamtpreis: %s  euro <br><br>
      Lieferadresse: &nbsp; %s &nbsp;, %s &nbsp;, %s &nbsp; <br><br>
      Telefonnummer: %s <br><br>
      Unternehmen: %s <br><br>
      Anmerkungen: %s <br><br>
      <br><br>
      Mit freundlichen Gruessen <br> TQ",
      htmlspecialchars($data['customer']['name']),
      implode('', array_map(
        function($item){
          return sprintf("<tr>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s </td>
          <td> %s &euro;</td>
          <td> %s &euro;</td>
        </tr>",
        $item['file_name'],
        $item['material_name'],
        $item['post_process_name'],
        $item['menge'],
        number_format($item['preis'], 2, '.', ''),
        number_format($item['menge'] *  $item['preis'], 2, '.', ''),
      );
        }, 
      $data['warencorb'])),
      number_format($data['total_price'], 2, '.', ''),
      $data['customer']['address'], $data["customer"]["zip"], $data["customer"]["city"],
      $data["customer"]["tel"],
      $data["customer"]["unternehmen"],
      $data["customer"]["note"]
    );
}


  function send_email($data, $to, $content, $order_id){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "TQ4090000@gmail.com";
    $mail->Password   = "woopwopp0019";
    $mail->IsHTML(true);
    $mail->AddAddress($to);
    $mail->SetFrom("TQ4090000@gmail.com", "TQ");
    $mail->Subject = "Bestellnummer " . $order_id ;
    foreach($data['warencorb'] as $model) {      
      $mail->addStringAttachment( $model['model_file'] , $model['file_name']);
    }
    $content = $mail->MsgHTML($content); 

if(!$mail->Send()) {
 // echo "Error while sending Email.";
  //var_dump($mail);
} else {

  //echo "Email sent successfully";
}
}




?>