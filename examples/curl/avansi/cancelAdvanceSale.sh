# Cancel the latest advance: POST /v1/advance-cases/{advanceCaseId}/cancellations
# Docs: https://bokapos.rs/en/api/referenca/avansi#cancelAdvanceSale
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/cancellations" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Idempotency-Key: order-5001-advance-1-cancel" \
  -H "Content-Type: application/json" \
  -d '{
  "cashier": {
    "id": "web-shop"
  },
  "advanceSaleFiscalDocumentId": "d5e6f7a8-b9c0-4d1e-8f2a-3b4c5d6e7f80"
}'
