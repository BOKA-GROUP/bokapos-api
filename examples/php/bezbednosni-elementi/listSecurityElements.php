<?php
// List security elements: GET /v1/security-elements
// Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#listSecurityElements
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/security-elements?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22');
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
