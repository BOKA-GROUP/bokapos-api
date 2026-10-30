# List products: GET /v1/products
# Docs: https://bokapos.rs/en/api/referenca/katalog#listProducts
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/products",
    headers=headers,
    params={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
        "search": "slušalice",
        "isActive": "true",
    },
)

result = response.json()
print(response.status_code, result)
