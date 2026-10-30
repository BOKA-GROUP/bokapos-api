<?php
// Cancel the latest advance: POST /v1/advance-cases/{advanceCaseId}/cancellations
// Docs: https://bokapos.rs/en/api/referenca/avansi#cancelAdvanceSale
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'cashier' => [
        'id' => 'web-shop',
    ],
    'advanceSaleFiscalDocumentId' => 'd5e6f7a8-b9c0-4d1e-8f2a-3b4c5d6e7f80',
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/cancellations');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-5001-advance-1-cancel',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
