# Refund a receipt: POST /v1/refund-workflows
# Docs: https://bokapos.rs/en/api/referenca/refundacije#createRefundWorkflow
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/refund-workflows" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Idempotency-Key: order-4127-refund-1" \
  -H "Content-Type: application/json" \
  -d '{
  "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
  "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
  "clientReference": "ORDER-4127-R1",
  "original": {
    "source": "BOKA",
    "fiscalDocumentId": "9f8e7d6c-5b4a-4321-8765-0fedcba98761"
  },
  "cashier": {
    "id": "web-shop"
  },
  "buyer": {
    "id": "20:001234567"
  },
  "items": [
    {
      "originalLineIndex": 0,
      "name": "Bluetooth slušalice",
      "unitOfMeasure": "kom",
      "quantity": 1,
      "unitPrice": 8990,
      "gtin": "8606012345678",
      "taxLabels": [
        "F"
      ]
    }
  ],
  "payments": [
    {
      "type": "CARD",
      "amount": 8990
    }
  ]
}'
