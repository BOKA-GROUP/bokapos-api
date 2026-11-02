<?php
// Add a webhook endpoint: POST /v1/webhook-endpoints
// Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookEndpoint
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'url' => 'https://shop.example.com/bokapos/webhooks',
    'description' => 'Web shop: status porudžbina',
    'eventTypes' => [
        'fiscal-document.fiscalized',
        'fiscal-document.outcome-unknown',
        'receipt-delivery.failed',
    ],
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/webhook-endpoints');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
