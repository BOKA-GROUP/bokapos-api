# Runtime and readiness: GET /v1/runtime
# Docs: https://bokapos.rs/en/api/referenca/runtime#getRuntime
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/runtime",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
