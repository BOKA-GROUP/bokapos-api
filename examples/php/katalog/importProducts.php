<?php
// Import the catalogue (CSV): POST /v1/products/import
// Docs: https://bokapos.rs/en/api/referenca/katalog#importProducts
// Values are illustrative sandbox values; replace the ids with your own.
$body = file_get_contents('katalog.csv');

$ch = curl_init('https://api.bokapos.rs/v1/products/import?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11');
curl_setopt_array($ch, [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
        'Content-Type: text/csv',
    ],
    CURLOPT_POSTFIELDS => $body,
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

$result = json_decode($response, true);
// $status and $result['status'] decide what happens next
