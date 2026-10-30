# Fetch a receipt representation: GET /v1/fiscal-documents/{fiscalDocumentId}/representations/{representationFormat}
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocumentRepresentation
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/representations/pdf-a4" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN" \
  --output racun-ORDER-4127.pdf
