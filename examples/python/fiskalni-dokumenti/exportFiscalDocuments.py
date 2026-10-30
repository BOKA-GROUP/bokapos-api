# Export the journal (CSV): GET /v1/fiscal-documents/export
# Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#exportFiscalDocuments
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/fiscal-documents/export",
    headers=headers,
    params={
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
        "createdFrom": "2026-09-01T00:00:00Z",
        "createdTo": "2026-10-01T00:00:00Z",
    },
)

response.raise_for_status()
with open("dnevnik-2026-09.csv", "wb") as f:
    f.write(response.content)
