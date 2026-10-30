# Search the journal: GET /v1/fiscal-documents
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#listFiscalDocuments
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/fiscal-documents?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22&status=FISCALIZED&createdFrom=2026-09-01T00%3A00%3A00Z&pageSize=50" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
