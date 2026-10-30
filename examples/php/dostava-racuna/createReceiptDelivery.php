<?php
// E-mail a receipt: POST /v1/receipt-deliveries
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#createReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'fiscalDocumentId' => '9f8e7d6c-5b4a-4321-8765-0fedcba98761',
    'channel' => 'EMAIL',
    'recipient' => 'kupac@example.com',
    'language' => 'sr-Latn',
    'attachments' => [
        'a4',
    ],
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/receipt-deliveries');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-4127-email-1',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
