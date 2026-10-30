// Issue a copy: POST /v1/fiscal-documents/{fiscalDocumentId}/copies
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocumentCopy
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/fiscal-documents/9f8e7d6c-5b4a-4321-8765-0fedcba98761/copies");
request.Headers.Add("Idempotency-Key", "order-4127-copy-1");
request.Content = new StringContent(
    """
    {
      "cashier": {
        "id": "web-shop"
      }
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
