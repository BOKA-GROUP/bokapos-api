# Open an advance case: POST /v1/advance-cases
# Docs: https://bokapos.rs/en/api/referenca/avansi#createAdvanceCase
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
    "Idempotency-Key": "order-5001-advance-case",
}

response = requests.post(
    "https://api.bokapos.rs/v1/advance-cases",
    headers=headers,
    json={
        "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
        "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
        "clientReference": "ORDER-5001",
    },
)

result = response.json()
print(response.status_code, result)
