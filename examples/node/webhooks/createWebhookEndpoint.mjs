// Add a webhook endpoint: POST /v1/webhook-endpoints
// Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookEndpoint
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/webhook-endpoints", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    "url": "https://shop.example.com/bokapos/webhooks",
    "description": "Web shop: status porudžbina",
    "eventTypes": [
      "fiscal-document.fiscalized",
      "fiscal-document.outcome-unknown",
      "receipt-delivery.failed"
    ]
  }),
});

const result = await response.json();
console.log(response.status, result);
