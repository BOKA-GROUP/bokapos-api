# Resend a delivery: POST /v1/webhook-endpoints/{webhookEndpointId}/deliveries/{webhookDeliveryId}/resend
# Docs: https://bokapos.rs/en/api/referenca/webhooks#resendWebhookDelivery
# Values are illustrative sandbox values; replace the ids with your own.
import os
import requests

headers = {
    "Authorization": f"Bearer {os.environ['BOKAPOS_TOKEN']}",
}

response = requests.post(
    "https://api.bokapos.rs/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3/deliveries/9fbe86a6-4d6a-4529-b162-ccacc98771a5/resend",
    headers=headers,
)

result = response.json()
print(response.status_code, result)
