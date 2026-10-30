<?php
// Current tax rates: GET /v1/tax-rates
// Docs: https://bokapos.rs/en/api/referenca/poreske-stope#listTaxRates
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/tax-rates?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11&businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22');
curl_setopt_array($ch, [
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
