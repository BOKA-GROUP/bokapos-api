// Add a webhook endpoint: POST /v1/webhook-endpoints
// Docs: https://bokapos.rs/en/api/referenca/webhooks#createWebhookEndpoint
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/webhook-endpoints");
request.Content = new StringContent(
    """
    {
      "url": "https://shop.example.com/bokapos/webhooks",
      "description": "Web shop: status porudžbina",
      "eventTypes": [
        "fiscal-document.fiscalized",
        "fiscal-document.outcome-unknown",
        "receipt-delivery.failed"
      ]
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
