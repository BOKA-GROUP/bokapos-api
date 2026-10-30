// E-mail a receipt: POST /v1/receipt-deliveries
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#createReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/receipt-deliveries", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Idempotency-Key": "order-4127-email-1",
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    "fiscalDocumentId": "9f8e7d6c-5b4a-4321-8765-0fedcba98761",
    "channel": "EMAIL",
    "recipient": "kupac@example.com",
    "language": "sr-Latn",
    "attachments": [
      "a4"
    ]
  }),
});

const result = await response.json();
console.log(response.status, result);
