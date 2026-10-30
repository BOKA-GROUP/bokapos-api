# List taxpayers: GET /v1/taxpayers
# Docs: https://bokapos.rs/en/api/referenca/obveznici-i-prostori#listTaxpayers
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/taxpayers" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
