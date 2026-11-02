<?php
// Resend a delivery: POST /v1/webhook-endpoints/{webhookEndpointId}/deliveries/{webhookDeliveryId}/resend
// Docs: https://bokapos.rs/en/api/referenca/webhooks#resendWebhookDelivery
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3/deliveries/9fbe86a6-4d6a-4529-b162-ccacc98771a5/resend');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
    ],
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
