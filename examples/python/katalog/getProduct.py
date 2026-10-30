# Read a product: GET /v1/products/{productId}
# Docs: https://bokapos.rs/en/api/referenca/katalog#getProduct
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/products/d2e3f4a5-b6c7-4d8e-9f0a-1b2c3d4e5f60",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
