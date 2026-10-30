# Read an advance case: GET /v1/advance-cases/{advanceCaseId}
# Docs: https://bokapos.rs/en/api/referenca/avansi#getAdvanceCase
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
