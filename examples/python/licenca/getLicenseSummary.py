# Licence state: GET /v1/license
# Docs: https://bokapos.rs/en/api/referenca/licenca#getLicenseSummary
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/license",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
