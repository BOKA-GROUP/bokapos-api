// List the deliveries of a receipt: GET /v1/receipt-deliveries
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#listReceiptDeliveries
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/receipt-deliveries?fiscalDocumentId=9f8e7d6c-5b4a-4321-8765-0fedcba98761", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
