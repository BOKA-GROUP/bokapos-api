<?php
// List advance cases: GET /v1/advance-cases
// Docs: https://bokapos.rs/en/api/referenca/avansi#listAdvanceCases
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/advance-cases?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&state=OPEN&search=ORDER-5001');
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
