<?php
// Read a Proforma or Training workflow: GET /v1/proforma-training-workflows/{proformaTrainingWorkflowId}
// Docs: https://bokapos.rs/en/api/referenca/predracun-i-obuka#getProformaTrainingWorkflow
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/proforma-training-workflows/0a1b2c3d-4e5f-4a6b-8c7d-8e9f0a1b2c3d');
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
