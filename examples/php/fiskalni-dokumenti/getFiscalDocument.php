<?php
// Read a document: GET /v1/fiscal-documents/{fiscalDocumentId}
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocument
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761');
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
