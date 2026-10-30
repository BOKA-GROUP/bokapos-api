<?php
// Read an advance case: GET /v1/advance-cases/{advanceCaseId}
// Docs: https://bokapos.rs/en/api/referenca/avansi#getAdvanceCase
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f');
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
