# Cancel the latest advance: POST /v1/advance-cases/{advanceCaseId}/cancellations
# Docs: https://bokapos.rs/en/api/referenca/avansi#cancelAdvanceSale
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-5001-advance-1-cancel",
}

response = requests.post(
    "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/cancellations",
    headers=headers,
    json={
        "cashier": {
            "id": "web-shop",
        },
        "advanceSaleFiscalDocumentId": "d5e6f7a8-b9c0-4d1e-8f2a-3b4c5d6e7f80",
    },
)

result = response.json()
print(response.status_code, result)
