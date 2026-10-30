# Fiscalize an advance payment: POST /v1/advance-cases/{advanceCaseId}/payments
# Docs: https://bokapos.rs/en/api/referenca/avansi#fiscalizeAdvancePayment
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-5001-advance-1",
}

response = requests.post(
    "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/payments",
    headers=headers,
    json={
        "cashier": {
            "id": "web-shop",
        },
        "items": [
            {
                "name": "10: Аванс (F)",
                "quantity": 1,
                "unitPrice": 3000,
                "taxLabels": [
                    "F",
                ],
            },
        ],
        "payments": [
            {
                "type": "WIRE_TRANSFER",
                "amount": 3000,
            },
        ],
        "paymentOccurredAt": "2026-09-02T11:30:00+02:00",
        "commercialFooter": "Avans za porudžbinu ORDER-5001. Isporuka po uplati ostatka.",
    },
)

result = response.json()
print(response.status_code, result)
