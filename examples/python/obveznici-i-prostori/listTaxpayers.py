# List taxpayers: GET /v1/taxpayers
# Docs: https://bokapos.rs/en/api/referenca/obveznici-i-prostori#listTaxpayers
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/taxpayers",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
