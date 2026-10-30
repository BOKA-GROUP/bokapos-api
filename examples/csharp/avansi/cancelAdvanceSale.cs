// Cancel the latest advance: POST /v1/advance-cases/{advanceCaseId}/cancellations
// Docs: https://bokapos.rs/en/api/referenca/avansi#cancelAdvanceSale
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/cancellations");
request.Headers.Add("Idempotency-Key", "order-5001-advance-1-cancel");
request.Content = new StringContent(
    """
    {
      "cashier": {
        "id": "web-shop"
      },
      "advanceSaleFiscalDocumentId": "d5e6f7a8-b9c0-4d1e-8f2a-3b4c5d6e7f80"
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
