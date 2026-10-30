// Issue a copy: POST /v1/fiscal-documents/{fiscalDocumentId}/copies
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocumentCopy
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/copies", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Idempotency-Key": "order-4127-copy-1",
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    "cashier": {
      "id": "web-shop"
    }
  }),
});

const result = await response.json();
console.log(response.status, result);
