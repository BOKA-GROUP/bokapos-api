# Add a webhook endpoint: POST /v1/webhook-endpoints
# Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookEndpoint
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.post(
    "https://api.bokapos.rs/v1/webhook-endpoints",
    headers=headers,
    json={
        "url": "https://shop.example.com/bokapos/webhooks",
        "description": "Web shop: status porudžbina",
        "eventTypes": [
            "fiscal-document.fiscalized",
            "fiscal-document.outcome-unknown",
            "receipt-delivery.failed",
        ],
    },
)

result = response.json()
print(response.status_code, result)
