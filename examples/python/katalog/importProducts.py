# Import the catalogue (CSV): POST /v1/products/import
# Docs: https://bokapos.rs/en/api/referenca/katalog#importProducts
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Content-Type": "text/csv",
}

response = requests.post(
    "https://api.bokapos.rs/v1/products/import",
    headers=headers,
    params={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
    },
    data=open("katalog.csv", "rb"),
)

result = response.json()
print(response.status_code, result)
