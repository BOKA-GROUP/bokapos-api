# Add a webhook endpoint: POST /v1/webhook-endpoints
# Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookEndpoint
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/webhook-endpoints" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
  "url": "https://shop.example.com/bokapos/webhooks",
  "description": "Web shop: status porudžbina",
  "eventTypes": [
    "fiscal-document.fiscalized",
    "fiscal-document.outcome-unknown",
    "receipt-delivery.failed"
  ]
}'
