# Event feed: GET /v1/events
# Docs: https://bokapos.rs/en/api/referenca/webhooks#listEvents
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/events",
    headers=headers,
    params={
        "after": "1041",
        "types": "fiscal-document.fiscalized,fiscal-document.outcome-unknown",
        "limit": "100",
    },
)

result = response.json()
print(response.status_code, result)
