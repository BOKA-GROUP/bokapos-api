// Read a delivery: GET /v1/receipt-deliveries/{receiptDeliveryId}
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#getReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/receipt-deliveries/f6a7b8c9-d0e1-4f2a-9b3c-4d5e6f7a8b90", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
