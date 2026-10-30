# Issue a Proforma or Training document: POST /v1/proforma-training-workflows
# Docs: https://bokapos.rs/en/api/referenca/predracun-i-obuka#createProformaTrainingWorkflow
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "quote-2210-proforma-1",
}

response = requests.post(
    "https://api.bokapos.rs/v1/proforma-training-workflows",
    headers=headers,
    json={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
        "clientReference": "QUOTE-2210",
        "invoiceType": "PROFORMA",
        "transactionType": "SALE",
        "cashier": {
            "id": "web-shop",
        },
        "buyer": {
            "id": "10:106952811",
        },
        "items": [
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
        "payments": [
            {
                "type": "WIRE_TRANSFER",
                "amount": 8990,
            },
        ],
        "commercialFooter": "Ponuda važi 7 dana.",
    },
)

result = response.json()
print(response.status_code, result)
