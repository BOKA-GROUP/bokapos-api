# Update a webhook endpoint: PUT /v1/webhook-endpoints/{webhookEndpointId}
# Docs: https://bokapos.rs/en/api/referenca/webhooks#putWebhookEndpoint
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.put(
    "https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3",
    headers=headers,
    json={
        "url": "https://shop.example.com/bokapos/webhooks",
        "description": "Web shop: status porudžbina i e-pošte",
        "eventTypes": [
            "fiscal-document.fiscalized",
            "fiscal-document.outcome-unknown",
            "receipt-delivery.delivered",
            "receipt-delivery.failed",
        ],
        "enabled": True,
    },
)

result = response.json()
print(response.status_code, result)
