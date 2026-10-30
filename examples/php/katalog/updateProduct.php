<?php
// Update a product: PUT /v1/products/{productId}
// Docs: https://bokapos.rs/en/api/referenca/katalog#updateProduct
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'sku' => 'BT-HP-001',
    'gtin' => '8606012345678',
    'name' => 'Bluetooth slušalice Pro',
    'unitOfMeasure' => 'kom',
    'grossUnitPrice' => 9490,
    'taxLabels' => [
        'F',
    ],
    'isActive' => true,
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/products/d2e3f4a5-b6c7-4d8e-9f0a-1b2c3d4e5f60');
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
