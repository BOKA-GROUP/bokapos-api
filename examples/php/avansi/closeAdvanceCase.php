<?php
// Close an advance case: POST /v1/advance-cases/{advanceCaseId}/close
// Docs: https://bokapos.rs/en/api/referenca/avansi#closeAdvanceCase
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'cashier' => [
        'id' => 'web-shop',
    ],
    'finalItems' => [
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
    'remainingPayments' => [
        [
            'type' => 'CARD',
            'amount' => 5990,
        ],
    ],
    'commercialFooter' => 'Hvala na kupovini.',
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/close');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Idempotency-Key: order-5001-close',
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
