# Read an operation: GET /v1/operations/{operationId}
# Docs: https://bokapos.rs/en/api/referenca/operacije#getOperation
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/operations/9f8e7d6c-5b4a-4321-8765-0fedcba98761" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
