# List security elements: GET /v1/security-elements
# Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#listSecurityElements
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/security-elements",
    headers=headers,
    params={
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
    },
)

result = response.json()
print(response.status_code, result)
