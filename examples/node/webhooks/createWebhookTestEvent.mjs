// Send a test event: POST /v1/webhook-endpoints/{webhookEndpointId}/test-events
// Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookTestEvent
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3/test-events", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
