// Signing public keys: GET /v1/webhook-signing-keys
// Docs: https://bokapos.rs/en/api/referenca/webhooks#listWebhookSigningKeys
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/webhook-signing-keys", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
