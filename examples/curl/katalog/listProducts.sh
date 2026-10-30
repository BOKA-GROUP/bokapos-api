# List products: GET /v1/products
# Docs: https://bokapos.rs/en/api/referenca/katalog#listProducts
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/products?taxpayerId=3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11&search=slu%C5%A1alice&isActive=true" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
