# Read an event: GET /v1/events/{eventId}
# Docs: https://bokapos.rs/en/api/referenca/webhooks#getEvent
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/events/21c0738c-e29c-480f-92a9-fb88a99dc514",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
