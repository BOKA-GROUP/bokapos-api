# Read a document: GET /v1/fiscal-documents/{fiscalDocumentId}
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocument
# Values are illustrative sandbox values; replace the ids with your own.
curl -X GET "https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761" \
  -H "Authorization: Bearer $BOKAPOS_TOKEN"
