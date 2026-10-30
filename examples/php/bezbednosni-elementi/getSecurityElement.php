<?php
// Read a security element: GET /v1/security-elements/{securityElementId}
// Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#getSecurityElement
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/security-elements/e5f6a7b8-c9d0-4e1f-8a2b-3c4d5e6f7a80');
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
