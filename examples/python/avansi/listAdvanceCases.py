# List advance cases: GET /v1/advance-cases
# Docs: https://bokapos.rs/en/api/referenca/avansi#listAdvanceCases
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/advance-cases",
    headers=headers,
    params={
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
        "state": "OPEN",
        "search": "ORDER-5001",
    },
)

result = response.json()
print(response.status_code, result)
