<?php
// Issue a copy: POST /v1/fiscal-documents/{fiscalDocumentId}/copies
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocumentCopy
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'cashier' => [
        'id' => 'web-shop',
    ],
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/copies');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-4127-copy-1',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
