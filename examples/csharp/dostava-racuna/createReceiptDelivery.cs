// E-mail a receipt: POST /v1/receipt-deliveries
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#createReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/receipt-deliveries");
request.Headers.Add("Idempotency-Key", "order-4127-email-1");
request.Content = new StringContent(
    """
    {
      "fiscalDocumentId": "9f8e7d6c-5b4a-4321-8765-0fedcba98761",
      "channel": "EMAIL",
      "recipient": "kupac@example.com",
      "language": "sr-Latn",
      "attachments": [
        "a4"
      ]
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
