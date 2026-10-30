# Add a product: POST /v1/products
# Docs: https://bokapos.rs/en/api/referenca/katalog#createProduct
# Values are illustrative sandbox values; replace the ids with your own.
curl -X POST "https://api.bokapos.rs/v1/products" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
  "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
  "sku": "BT-HP-001",
  "gtin": "8606012345678",
  "name": "Bluetooth slušalice",
  "unitOfMeasure": "kom",
  "grossUnitPrice": 8990,
  "taxLabels": [
    "F"
  ]
}'
