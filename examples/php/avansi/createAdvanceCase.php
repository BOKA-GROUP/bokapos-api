<?php
// Open an advance case: POST /v1/advance-cases
// Docs: https://bokapos.rs/en/api/referenca/avansi#createAdvanceCase
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'taxpayerId' => '3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11',
    'businessPremiseId' => 'b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22',
    'clientReference' => 'ORDER-5001',
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/advance-cases');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-5001-advance-case',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
