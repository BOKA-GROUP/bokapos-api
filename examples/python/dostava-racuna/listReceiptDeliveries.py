# List the deliveries of a receipt: GET /v1/receipt-deliveries
# Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#listReceiptDeliveries
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/receipt-deliveries",
    headers=headers,
    params={
        "fiscalDocumentId": "9f8e7d6c-5b4a-4321-8765-0fedcba98761",
    },
)

result = response.json()
print(response.status_code, result)
