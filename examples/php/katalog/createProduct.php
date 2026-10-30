<?php
// Add a product: POST /v1/products
// Docs: https://bokapos.rs/en/api/referenca/katalog#createProduct
// Values are illustrative sandbox values; replace the ids with your own.
$body = json_encode([
    'taxpayerId' => '3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11',
    'sku' => 'BT-HP-001',
    'gtin' => '8606012345678',
    'name' => 'Bluetooth slušalice',
    'unitOfMeasure' => 'kom',
    'grossUnitPrice' => 8990,
    'taxLabels' => [
        'F',
    ],
], JSON_UNESCAPED_UNICODE);

$ch = curl_init('https://api.bokapos.rs/v1/products');
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
