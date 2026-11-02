# List webhook endpoints: GET /v1/webhook-endpoints
# Docs: https://bokapos.rs/en/api/referenca/webhooks#listWebhookEndpoints
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.get(
    "https://api.bokapos.rs/v1/webhook-endpoints",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
