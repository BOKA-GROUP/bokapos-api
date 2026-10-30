# Add a product: POST /v1/products
# Docs: https://bokapos.rs/en/api/referenca/katalog#createProduct
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.post(
    "https://api.bokapos.rs/v1/products",
    headers=headers,
    json={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
        "sku": "BT-HP-001",
        "gtin": "8606012345678",
        "name": "Bluetooth slušalice",
        "unitOfMeasure": "kom",
        "grossUnitPrice": 8990,
        "taxLabels": [
            "F",
        ],
    },
)

result = response.json()
print(response.status_code, result)
