# E-mail a receipt: POST /v1/receipt-deliveries
# Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#createReceiptDelivery
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-4127-email-1",
}

response = requests.post(
    "https://api.bokapos.rs/v1/receipt-deliveries",
    headers=headers,
    json={
        "fiscalDocumentId": "9f8e7d6c-5b4a-4321-8765-0fedcba98761",
        "channel": "EMAIL",
        "recipient": "kupac@example.com",
        "language": "sr-Latn",
        "attachments": [
            "a4",
        ],
    },
)

result = response.json()
print(response.status_code, result)
