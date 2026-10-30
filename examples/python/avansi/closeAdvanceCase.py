# Close an advance case: POST /v1/advance-cases/{advanceCaseId}/close
# Docs: https://bokapos.rs/en/api/referenca/avansi#closeAdvanceCase
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-5001-close",
}

response = requests.post(
    "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/close",
    headers=headers,
    json={
        "cashier": {
            "id": "web-shop",
        },
        "finalItems": [
            {
                "name": "Bluetooth slušalice",
                "unitOfMeasure": "kom",
                "quantity": 1,
                "unitPrice": 8990,
                "gtin": "8606012345678",
                "taxLabels": [
                    "F",
                ],
            },
        ],
        "remainingPayments": [
            {
                "type": "CARD",
                "amount": 5990,
            },
        ],
        "commercialFooter": "Hvala na kupovini.",
    },
)

result = response.json()
print(response.status_code, result)
