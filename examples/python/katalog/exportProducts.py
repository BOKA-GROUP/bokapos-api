# Export the catalogue (CSV): GET /v1/products/export
# Docs: https://bokapos.rs/en/api/referenca/katalog#exportProducts
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/products/export",
    headers=headers,
    params={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
    },
)

response.raise_for_status()
with open("katalog.csv", "wb") as f:
    f.write(response.content)
