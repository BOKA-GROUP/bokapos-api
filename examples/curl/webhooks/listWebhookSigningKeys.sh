# Signing public keys: GET /v1/webhook-signing-keys
# Docs: https://bokapos.rs/en/api/referenca/webhooks#listWebhookSigningKeys
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/webhook-signing-keys" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
