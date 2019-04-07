<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '/var/www/html/text-demo/twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure

$config = parse_ini_file('/var/www/private/config.ini');

$sid    = $config['sid']; //"ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$token  = $config['token']; //"your_auth_token";
$twilio = new Client($sid, $token);

/*
//Load data from answerset
$AnswerKey = isset($_POST['AnswerKey']) ? $_POST['AnswerKey'] : null ;

// Get user names, submit date
//$results = $xslt->transformToDoc($xmlobject);
//$s = simplexml_load_string($AnswerKey);
$doc = new DOMDocument();
$doc->loadXML($AnswerKey);
$xpath = new DOMXPath($doc);
$firstname = $xpath->query("//Answer[@name='Client first name TE']/TextValue")->item(0)->nodeValue;

$lastname = $xpath->query("//Answer[@name='Client last name TE']/TextValue")->item(0)->nodeValue;

$phone = $xpath->query("//Answer[@name='Client last name TE']/TextValue")->item(0)->nodeValue;

*/
//Send Message
$message = $twilio->messages
                  ->create("+17086550418",//"+17036263287", // to
                           array(
                               "body" => "Tobias testing twilio by spamming Jess's phone",
                               "from" => "+13605294396"
                           )
                  );

print($message->sid);
