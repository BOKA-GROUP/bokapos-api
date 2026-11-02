# Delivery history: GET /v1/webhook-endpoints/{webhookEndpointId}/deliveries
# Docs: https://bokapos.rs/en/api/referenca/webhooks#listWebhookDeliveries
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3/deliveries" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
