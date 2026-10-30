# Close an advance case: POST /v1/advance-cases/{advanceCaseId}/close
# Docs: https://bokapos.rs/en/api/referenca/avansi#closeAdvanceCase
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/close" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Idempotency-Key: order-5001-close" \
  -H "Content-Type: application/json" \
  -d '{
  "cashier": {
    "id": "web-shop"
  },
  "finalItems": [
    {
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
  "remainingPayments": [
    {
      "type": "CARD",
      "amount": 5990
    }
  ],
  "commercialFooter": "Hvala na kupovini."
}'
