# Issue a copy: POST /v1/fiscal-documents/{fiscalDocumentId}/copies
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocumentCopy
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/copies" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Idempotency-Key: order-4127-copy-1" \
  -H "Content-Type: application/json" \
  -d '{
  "cashier": {
    "id": "web-shop"
  }
}'
