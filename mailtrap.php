<?php

use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;

require __DIR__ . '/vendor/autoload.php';

$apiKey = '<YOUR_API_TOKEN>';
$mailtrap = MailtrapClient::initSendingEmails(
    apiKey: $apiKey,
);

$email = (new MailtrapEmail())
    ->from(new Address('hello@iglina.com', 'Mailtrap Test'))
    ->to(new Address("franco.iglina@davinci.edu.ar"))
    ->subject('You are awesome!')
    ->text('Congrats for sending test email with Mailtrap!')
    ->category('Integration Test')
;

$response = $mailtrap->send($email);

var_dump(ResponseHelper::toArray($response));