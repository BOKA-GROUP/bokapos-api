<?php
// Update a webhook endpoint: PUT /v1/webhook-endpoints/{webhookEndpointId}
// Docs: https://bokapos.rs/en/api/referenca/webhooks#putWebhookEndpoint
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'url' => 'https://shop.example.com/bokapos/webhooks',
    'description' => 'Web shop: status porudžbina i e-pošte',
    'eventTypes' => [
        'fiscal-document.fiscalized',
        'fiscal-document.outcome-unknown',
        'receipt-delivery.delivered',
        'receipt-delivery.failed',
    ],
    'enabled' => true,
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'PUT',
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
