# List webhook endpoints: GET /v1/webhook-endpoints
# Docs: https://bokapos.rs/en/api/referenca/webhooks#listWebhookEndpoints
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/webhook-endpoints" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
