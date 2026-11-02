// Update a webhook endpoint: PUT /v1/webhook-endpoints/{webhookEndpointId}
// Docs: https://bokapos.rs/en/api/referenca/webhooks#putWebhookEndpoint
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Put, "/v1/webhook-endpoints/287978af-8d23-4e51-8c51-59d60c5fb9c3");
request.Content = new StringContent(
    """
    {
      "url": "https://shop.example.com/bokapos/webhooks",
      "description": "Web shop: status porudžbina i e-pošte",
      "eventTypes": [
        "fiscal-document.fiscalized",
        "fiscal-document.outcome-unknown",
        "receipt-delivery.delivered",
        "receipt-delivery.failed"
      ],
      "enabled": true
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
