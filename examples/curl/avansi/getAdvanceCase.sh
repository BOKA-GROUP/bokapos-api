# Read an advance case: GET /v1/advance-cases/{advanceCaseId}
# Docs: https://bokapos.rs/en/api/referenca/avansi#getAdvanceCase
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
