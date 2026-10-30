# Update a product: PUT /v1/products/{productId}
# Docs: https://bokapos.rs/en/api/referenca/katalog#updateProduct
# Values are illustrative sandbox values; replace the ids with your own.
curl -X PUT "https://api.bokapos.rs/v1/products/d2e3f4a5-b6c7-4d8e-9f0a-1b2c3d4e5f60" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
  "sku": "BT-HP-001",
  "gtin": "8606012345678",
  "name": "Bluetooth slušalice Pro",
  "unitOfMeasure": "kom",
  "grossUnitPrice": 9490,
  "taxLabels": [
    "F"
  ],
  "isActive": true
}'
