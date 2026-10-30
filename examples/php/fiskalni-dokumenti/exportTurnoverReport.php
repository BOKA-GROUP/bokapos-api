<?php
// Export the turnover report (CSV): GET /v1/fiscal-documents/turnover-report/export
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportTurnoverReport
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/fiscal-documents/turnover-report/export?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11&businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&pfrFrom=2026-09-01T00%3A00%3A00%2B02%3A00&pfrTo=2026-09-02T00%3A00%3A00%2B02%3A00');
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
file_put_contents('promet-2026-09-01.csv', $response);
