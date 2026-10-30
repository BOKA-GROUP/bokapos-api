# Issue a copy: POST /v1/fiscal-documents/{fiscalDocumentId}/copies
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocumentCopy
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-4127-copy-1",
}

response = requests.post(
    "https://api.bokapos.rs/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/copies",
    headers=headers,
    json={
        "cashier": {
            "id": "web-shop",
        },
    },
)

result = response.json()
print(response.status_code, result)
