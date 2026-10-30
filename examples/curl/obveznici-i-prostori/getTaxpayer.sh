# Read a taxpayer: GET /v1/taxpayers/{taxpayerId}
# Docs: https://bokapos.rs/en/api/referenca/obveznici-i-prostori#getTaxpayer
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/taxpayers/3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
