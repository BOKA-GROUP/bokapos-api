<?php
// Issue a Normal Sale receipt: POST /v1/fiscal-documents
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocument
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'taxpayerId' => '3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11',
    'businessPremiseId' => 'b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22',
    'clientReference' => 'ORDER-4127',
    'invoiceType' => 'NORMAL',
    'transactionType' => 'SALE',
    'cashier' => [
        'id' => 'web-shop',
        'displayName' => 'Web shop',
    ],
    'items' => [
        [
            'name' => 'Bluetooth slušalice',
            'unitOfMeasure' => 'kom',
            'quantity' => 1,
            'unitPrice' => 8990,
            'gtin' => '8606012345678',
            'taxLabels' => [
                'F',
            ],
        ],
    ],
    'payments' => [
        [
            'type' => 'CARD',
            'amount' => 8990,
        ],
    ],
    'metadata' => [
        'orderId' => '4127',
        'channel' => 'web',
    ],
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/fiscal-documents');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-4127-sale-1',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
