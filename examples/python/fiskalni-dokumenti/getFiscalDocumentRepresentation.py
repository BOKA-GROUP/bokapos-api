# Fetch a receipt representation: GET /v1/fiscal-documents/{fiscalDocumentId}/representations/{representationFormat}
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#getFiscalDocumentRepresentation
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/representations/pdf-a4",
    headers=headers,
)

response.raise_for_status()
with open("racun-ORDER-4127.pdf", "wb") as f:
    f.write(response.content)
