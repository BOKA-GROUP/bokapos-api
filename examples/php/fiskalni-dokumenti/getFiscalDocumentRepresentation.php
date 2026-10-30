<?php
// Fetch a receipt representation: GET /v1/fiscal-documents/{fiscalDocumentId}/representations/{representationFormat}
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocumentRepresentation
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/representations/pdf-a4');
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
file_put_contents('racun-ORDER-4127.pdf', $response);
