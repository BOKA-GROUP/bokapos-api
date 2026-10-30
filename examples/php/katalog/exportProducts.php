<?php
// Export the catalogue (CSV): GET /v1/products/export
// Docs: https://bokapos.rs/en/api/referenca/katalog#exportProducts
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/products/export?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . getenv('BOKAPOS_TOKEN'),
    ],
]);
$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
curl_close($ch);

if ($status !== 200) { throw new RuntimeException("HTTP $status"); }
file_put_contents('katalog.csv', $response);
