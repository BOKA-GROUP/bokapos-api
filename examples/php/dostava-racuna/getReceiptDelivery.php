<?php
// Read a delivery: GET /v1/receipt-deliveries/{receiptDeliveryId}
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#getReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
$ch = curl_init('https://api.bokapos.rs/v1/receipt-deliveries/f6a7b8c9-d0e1-4f2a-9b3c-4d5e6f7a8b90');
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
